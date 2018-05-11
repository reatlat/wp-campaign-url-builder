/*
 * decaffeinate suggestions:
 * DS102: Remove unnecessary code created because of implicit returns
 * Full docs: https://github.com/decaffeinate/decaffeinate/blob/master/docs/suggestions.md
 */
/*
 * General requires
 */
const app          = require('./package.json');
const uuid         = require('uuid/v4')();
const gulp         = require('gulp');
const runSequence  = require('run-sequence');
const Notification = require('node-notifier');
const $ = require('gulp-load-plugins')({
  pattern: [
    'gulp-*',
    'gulp.*'
  ],
  replaceString: /\bgulp[\-.]/});

const fingerOptions = {
    base: 'admin/',
    regex: /(?:admin\/(.*?)["'])|(?:url\(..\/(.*?)\))/g
};


/*
 * Default paths
 */
const path         = {};
path.temp    = './wp-data/wp-content/plugins/campaign-url-builder';
path.source  = './source';
path.release = './release';
path.dist    = path.release;
let csso_options = '';

gulp.task('default', [ 'dev' ]);

/*
 * Regular tasks
 */
gulp.task('dev', function(callback) {
  path.dist = path.temp;
  csso_options = {restructure: false, sourceMap: true, debug: true};
  return runSequence([
    'clean_temp_folder'
  ], [
    'styles',
    'scripts',
    'copy_languages',
    'copy_php',
    'copy_images'
  ], 'watch', callback);
});

gulp.task('build', callback =>
  runSequence([
    'clean_temp_folder',
    'clean_release_folder'
  ], [
    'copy_languages',
    'copy_php',
    'copy_images',
    'copy_readme',
    'copy_license',
    'styles',
    'scripts'

  ], [
      'copy_release_to_temp'
  ], 'zip', callback)
);


/*
 * Tasks
 */

gulp.task('styles', callback =>
  runSequence([
    'styles_admin',
    'styles_public'
  ], 'zip', callback)
);

gulp.task('styles_admin', () =>
  gulp.src(path.source+'/_styles/!(_)*-admin.scss')
    .pipe($.sass({errLogToConsole: true}).on('error', errorHandler('SASS')))
    .pipe($.autoprefixer('last 2 version'))
    .pipe($.stripCssComments({preserve: false}))
    .pipe($.csso(csso_options))
    .pipe(gulp.dest(path.dist+'/admin/assets/css/'))
);

gulp.task('styles_public', () =>
  gulp.src(path.source+'/_styles/!(_)*-public.scss')
    .pipe($.sass({errLogToConsole: true}).on('error', errorHandler('SASS')))
    .pipe($.autoprefixer('last 2 version'))
    .pipe($.stripCssComments({preserve: false}))
    .pipe($.csso(csso_options))
    .pipe(gulp.dest(path.dist+'/public/assets/css/'))
);

gulp.task('clean_release_folder', () =>
  gulp.src(path.release, {read: false})
    .pipe($.clean())
);

gulp.task('clean_temp_folder', () =>
  gulp.src(path.temp+'/*!(.gitkeep)', {read: false})
    .pipe($.clean())
);

gulp.task('scripts', callback =>
  runSequence([
    'javaScripts_admin',
    'javaScripts_vendor_admin',
    'javaScripts_public',
    'javaScripts_vendor_public'
  ], callback)
);

gulp.task('javaScripts_admin', () =>
  gulp.src(path.source+'/_scripts/!(_)*-admin.js')
    .pipe($.include({extension: '.js'}).on('error', errorHandler('Include *.js')))
    .pipe($.uglifyEs.default({output: {comments: /^!/}}))
    .pipe(gulp.dest(path.dist+'/admin/assets/js/'))
);

gulp.task('javaScripts_vendor_admin', () =>
  gulp.src(path.source+'/_scripts/vendor/admin/*.min.js')
    .pipe(gulp.dest(path.dist+'/admin/assets/js/vendor/'))
);

gulp.task('javaScripts_public', () =>
  gulp.src(path.source+'/_scripts/!(_)*-public.js')
    .pipe($.include({extension: '.js'}).on('error', errorHandler('Include *.js')))
    .pipe($.uglifyEs.default({output: {comments: /^!/}}))
    .pipe(gulp.dest(path.dist+'/public/assets/js/'))
);

gulp.task('javaScripts_vendor_public', () =>
  gulp.src(path.source+'/_scripts/vendor/public/*.min.js')
    .pipe(gulp.dest(path.dist+'/public/assets/js/vendor/'))
);

gulp.task('copy_languages', () =>
  gulp.src(path.source+'/languages/*')
    .pipe(gulp.dest(path.dist+'/languages/'))
);

gulp.task('copy_php', () =>
  gulp.src(path.source+'/**/*.php')
    .pipe($.replace('{% APP_VER %}', app.version))
    .pipe(gulp.dest(path.dist))
);

gulp.task('copy_images', () =>
  gulp.src(path.source+'/**/*.{svg,SVG,jpg,JPG,png,PNG,gif,GIF}')
    .pipe(gulp.dest(path.dist))
);

gulp.task('copy_license', () =>
  gulp.src('LICENSE')
    .pipe($.rename({
      basename: "license",
      extname: ".txt"
    }))
    .pipe(gulp.dest(path.dist))
);

gulp.task('copy_readme', () =>
  gulp.src(path.source+'/readme.txt')
    .pipe(gulp.dest(path.dist))
);

gulp.task('copy_release_to_temp', () =>
  gulp.src(path.release+'/**/*')
    .pipe(gulp.dest(path.temp+'/'+app.name.replace('wp-','')))
);


gulp.task('rev-manifest', () =>
    gulp.src(path.dist+'/admin/**/!(sitemap)*.{xml,json,js,css,ico,gif,png,jpg,svg,eot,ttf,woff,woff2}')
        .pipe($.rev())
        .pipe(gulp.dest(path.dist+'/admin/'))
        .pipe($.revDeleteOriginal())
        .pipe($.rev.manifest('../../temp/rev-manifest.json'))
        .pipe(gulp.dest(path.dist+'/admin/'))
);

gulp.task('fingerprint', () =>
    gulp.src(path.release+'/**/!(sitemap)*.{php,html,xml,json,css}')
        .pipe($.fingerprint(require('./temp/rev-manifest.json'), fingerOptions))
        .pipe(gulp.dest('./temp/'))
);

gulp.task('zip', () =>
  gulp.src(path.temp+'/'+app.name.replace('wp-','')+'*/**')
    .pipe($.archiver(app.name+'-v'+app.version+'.zip').on('error', errorHandler('ZIP Compression')))
    .pipe($.notify({
      title: 'Gulp Archiver',
      message: 'App already archived to zip file',
      icon: __dirname+'/includes/reatlat-the-real-jedi.png'}))
    .pipe(gulp.dest(path.release))
);

gulp.task('test', () =>
  Notification.notify({
    title: '!!! Test task for example !!!',
    message: 'All done!\nPlease check result!',
    icon: __dirname+'/includes/reatlat-the-real-jedi.png'
  })
);

gulp.task('done', () =>
  Notification.notify({
    title: 'Congrats!',
    message: 'All done!\nPlease check result!',
    icon: __dirname+'/includes/reatlat-the-real-jedi.png'
  })
);

gulp.task('watch', function() {
// Watch all files -  *.js and *.scss
  console.log('');
  console.log('  May the Force be with you');
  console.log('');
  gulp.watch(path.source+'/_scripts/**/*.js', [ 'scripts' ]);
  gulp.watch(path.source+'/_styles/**/*', [ 'styles' ]);
  return gulp.watch(path.source+'/**/*.php', [ 'copy_php' ]);
});


/*
 * Helpers
 */
var errorHandler = title =>
  function(error) {
    $.util.log($.util.colors.yellow(error.message));
    Notification.notify({
      title,
      message: error.message,
      icon: __dirname+'/includes/reatlat-the-real-jedi.png'
    });
    return this.emit('end');
  }
;
