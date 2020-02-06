const   gulp = require('gulp'),

        webpackStream = require('webpack-stream'),

        browsersync = require('browser-sync').create(),
        autoprefixer = require('gulp-autoprefixer'),
        sass = require('gulp-sass'),
        notify = require('gulp-notify'),
        plumber = require('gulp-plumber'),

        path = {
            src: 'themes/resto-service',
            dist: 'themes/resto-service',
            scss: 'scss',
            css: 'css',
            js: 'js'
        },

        files = {
            php: '**/*.php',
            css: `${path.dist}/${path.css}/**/*.css`,
            scss: `${path.src}/${path.scss}/**/*.scss`,
            js: `${path.src}/${path.js}/src/**/*.js`
        }

let webpackOptions = require('./webpack.config')


// BrowserSync
function browserSync(done) {
    browsersync.init({
        proxy: 'resto'
    })

    done()
}


// BrowserSync Reload
function browserSyncReload(done) {
    browsersync.reload()

    done()
}


// CSS task
function cssGenerate() {
    return gulp
        .src(files.scss)
        .pipe(plumber({
            errorHandler: notify.onError( err => ({
                title: 'SCSS Builder',
                message: err.message
            }))
        }))
        .pipe(sass({ outputStyle: 'nested' }).on('error', sass.logError))
        .pipe(autoprefixer('last 2 versions'))
        .pipe(gulp.dest(`${path.dist}/${path.css}`))
        .pipe(browsersync.stream())
}


// Webpack
function jsGenerate() {
    webpackOptions.mode = 'development'

    return gulp
        .src(files.js)
        .pipe(plumber({
            errorHandler: notify.onError( err => ({
                title: 'Webpack Builder',
                message: err.message
            }))
        }))
        .pipe(webpackStream(webpackOptions))
        .pipe(gulp.dest(`${path.dist}/${path.js}`))
        .pipe(browsersync.stream())
}


// Watch files
function watchFiles() {
    gulp.watch(files.scss, cssGenerate)
    gulp.watch(files.js, jsGenerate)
    gulp.watch([ files.php ], browserSyncReload)
}


const watch = gulp.parallel(watchFiles, browserSync)

exports.css = cssGenerate
exports.default = gulp.series(jsGenerate, cssGenerate, watch)
