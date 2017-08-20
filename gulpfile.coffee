###
# General requires
###
app          = require('./package.json')
uuid         = require('uuid/v4')()
gulp         = require('gulp')
runSequence  = require('run-sequence')
Notification = require('node-notifier')
$ = require('gulp-load-plugins')(
  pattern: [
    'gulp-*'
    'gulp.*'
  ]
  replaceString: /\bgulp[\-.]/)

###
# Default paths
###
path         = {}
path.temp    = './temp'
path.source  = './source'
path.release = './release'
path.dist    = path.release
csso_options = ''

gulp.task 'default', [ 'test' ]


###
# Regular tasks
###
gulp.task 'dev', (callback) ->
  path.dist = path.temp
  csso_options = {restructure: false, sourceMap: true, debug: true}
  runSequence [
    'clean_temp_folder'
  ], [
    'styles_scss'
    'scripts'
    'copy_php'
  ], 'watch', callback

gulp.task 'build', (callback) ->
  runSequence [
    'clean_temp_folder'
    'clean_release_folder'
  ], [
    'copy_php'
    'copy_readme'
    'copy_license'
    'styles_scss'
    'scripts'
  ], [
    'copy_release_to_temp'
  ], 'zip', callback


###
# Tasks
###

gulp.task 'styles_scss', ->
  gulp.src(path.source+'/_styles/**/!(_)*.scss')
    .pipe($.sass(errLogToConsole: true).on('error', errorHandler('SASS')))
    .pipe($.autoprefixer('last 2 version'))
    .pipe($.stripCssComments(preserve: false))
    .pipe($.csso(csso_options))
    .pipe gulp.dest(path.dist)

gulp.task 'clean_release_folder', ->
  gulp.src(path.dist, read: false)
    .pipe $.clean()

gulp.task 'clean_temp_folder', ->
  gulp.src(path.dist+'/*!(.gitkeep)', read: false)
    .pipe $.clean()

gulp.task 'scripts', (callback) ->
  runSequence [
    'coffeeScripts'
    'javaScripts'
  ], callback

gulp.task 'coffeeScripts', ->
  gulp.src(path.source+'/_scripts/**/!(_)*.coffee')
    .pipe($.include(extension: '.coffee').on('error', errorHandler('Include *.coffee')))
    .pipe($.coffee(bare: true).on('error', errorHandler('CoffeeScript')))
    .pipe($.uglify({}))
    .pipe gulp.dest(path.dist)

gulp.task 'javaScripts', ->
  gulp.src(path.source+'/_scripts/**/!(_)*.js')
    .pipe($.include(extension: '.js').on('error', errorHandler('Include *.js')))
    .pipe($.uglify({}))
    .pipe gulp.dest(path.dist)

gulp.task 'copy_php', ->
  gulp.src(path.source+'/**/*.php')
    .pipe($.replace('{% APP_VER %}', app.version))
    .pipe gulp.dest(path.dist)

gulp.task 'copy_license', ->
  gulp.src('LICENSE')
    .pipe($.rename({
      basename: "license",
      extname: ".txt"
    }))
    .pipe gulp.dest(path.dist)

gulp.task 'copy_readme', ->
  gulp.src(path.source+'/readme.txt')
    .pipe gulp.dest(path.dist)

gulp.task 'copy_release_to_temp', ->
  gulp.src(path.release+'/**/*')
    .pipe gulp.dest(path.temp+'/'+app.name)

gulp.task 'zip', ->
  gulp.src(path.temp+'/'+app.name+'*/**')
    .pipe($.archiver(app.name+'-'+app.version+'.zip').on('error', errorHandler('ZIP Compression')))
    .pipe($.notify(
      title: 'Gulp Archiver'
      message: 'App already archived to zip file'
      icon: __dirname+'/includes/icon--reatlat.png'))
    .pipe gulp.dest(path.release)

gulp.task 'test', ->
  Notification.notify
    title: '!!! Test task for example !!!'
    message: 'All done!\nPlease check result!'
    icon: __dirname+'/includes/icon--reatlat.png'

gulp.task 'done', ->
  Notification.notify
    title: 'Congrats!'
    message: 'All done!\nPlease check result!'
    icon: __dirname+'/includes/icon--reatlat.png'

gulp.task 'watch', ->
# Watch all files - *.coffee, *.js and *.scss
  console.log ''
  console.log '  May the Force be with you'
  console.log ''
  gulp.watch path.source+'/_scripts/**/*.{coffee,js}', [ 'scripts' ]
  gulp.watch path.source+'/_styles/**/*', [ 'styles_scss' ]
  gulp.watch path.source+'/**/*.php', [ 'copy_php' ]


###
# Helpers
###
errorHandler = (title) ->
  (error) ->
    $.util.log $.util.colors.yellow(error.message)
    Notification.notify
      title: title
      message: error.message
      icon: __dirname+'/includes/icon--reatlat.png'
    @emit 'end'
