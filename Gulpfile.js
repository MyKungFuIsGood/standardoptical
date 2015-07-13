// Include gulp
var gulp = require('gulp');

var plugins = require('gulp-load-plugins')();
var pkg = require ('./package.json');

// Unsure how to get these to work with gulp-load-plugins
var autoprefixer = require('autoprefixer-core');
var mqpacker     = require('css-mqpacker');
var focus 			 = require('postcss-focus');

var dirs = {
	"src": "src",
	"assets": "assets"
};

var paths = {
	sass: [
		dirs.src + '/scss/**/*.scss'
	],
	script: [
		dirs.src + '/js/*.js',
		dirs.src + '/js/scripts/*.js'
	],
	watch: [
		'views/**/*.php',
		'views/**/*.html'
	]
};

// Concatenate & Minify JS
gulp.task('script', function() {
	return gulp.src( paths.script )
	.pipe(plugins.plumber(function(error) {
		plugins.util.log(
			plugins.util.colors.red(error.message),
			plugins.util.colors.yellow('\r\nOn line: '+error.line),
			plugins.util.colors.yellow('\r\nCode Extract: '+error.extract)
			);
		this.emit('end');
	}))
	.pipe(plugins.concat('main.js'))
	.pipe(gulp.dest( dirs.assets + '/js/' ))
	.pipe(plugins.uglify())
	.pipe(plugins.rename('main.min.js'))
	.pipe(gulp.dest( dirs.assets + '/js/' ))
	.pipe(plugins.livereload());
});

// Compile our less
gulp.task('sass', function() {
	// Make sure our css is compatible with the last two versions of all browsers
	// For all ::hover styles duplicate a ::focus style
	// Condense mediaquery calls
	var processors = [
		autoprefixer({browsers: ['last 2 version']}),
		focus,
		mqpacker,
	];

	return gulp.src( 'src/sass/main.scss' )
	.pipe(plugins.plumber(function(error) {
		plugins.util.log(
			plugins.util.colors.red(error.message),
			plugins.util.colors.yellow('\r\nOn line: '+error.line),
			plugins.util.colors.yellow('\r\nCode Extract: '+error.extract)
			);
		this.emit('end');
	}))
	.pipe(plugins.sass())
	.pipe(plugins.postcss( processors ))
	.pipe(plugins.minifyCss())
	.pipe(plugins.rename('main.min.css'))
	.pipe(gulp.dest( dirs.assets + '/css/' ))
	.pipe(plugins.livereload());
});

// Bower Update Task
gulp.task('bower', function() {
	return plugins.bower();
});

// Migrate Vendor Dependencies 
gulp.task('vendor',['bower'], function() {

	//
	gulp.src( 'src/vendor/materialize/dist/js/materialize.min.js' )
	.pipe(gulp.dest( dirs.assets + '/js/plugins' ));

	//
	gulp.src( 'src/vendor/materialize/dist/font/**/*')
	.pipe(gulp.dest( dirs.assets + '/font' ));

	//
	gulp.src( 'src/vendor/materialize/sass/components/**/*')
	.pipe(gulp.dest( dirs.src + '/sass/materialize' ));

	//
	gulp.src( 'src/vendor/jquery/dist/jquery.min.js' )
	.pipe(gulp.dest( dirs.assets + '/js/plugins' ));

	//
	gulp.src( 'src/vendor/modernizr/modernizr.js' )
	.pipe(gulp.dest( dirs.assets + '/js/plugins' ));

});

// Watch Files For Changes
gulp.task('watch', function() {
	plugins.livereload.listen(23456);
	gulp.watch( paths.script , ['script']);
	gulp.watch( paths.sass, ['sass']);
	gulp.watch( paths.watch ).on('change', function (event) {
		plugins.livereload.changed(event.path);
	});
});