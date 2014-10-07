module.exports = function(grunt) {
	"use strict";

	grunt.initConfig({
		sass: {
			dist: {
				options: {
					banner: "/*! Built by Mohamed Ali Abuelwafa @abuelwafa */",
					unixNewlines: true,
					style: "compressed",
				},
				files: [{
					expand: true,
					flatten: true,
					cwd: "styles",
					src: ["**/*.scss"],
					dest: "public/css",
					ext: ".css"
				}]
			}
		},

		jshint: {
			dist: ["Gruntfile.js", "scripts/front/*.js", "scripts/admin/*.js"]
		},

		uglify: {
			dist: {
				options: {
					sourceMap: true,
					banner: "/*! Built by Mohamed Ali Abuelwafa @abuelwafa */",
					footer: "\n/*! Built by Mohamed Ali Abuelwafa @abuelwafa */",
					preserveComments: false
				},
				files: {
					"public/js/script.js": [
						"scripts/front/vendor/bootstrap.min.js",
						"scripts/front/vendor/ie10-viewport-bug-workaround.js",
						"scripts/front/script.js"
					],
					"public/js/admin.js": [
						"scripts/front/vendor/bootstrap.min.js",
						"scripts/front/vendor/ie10-viewport-bug-workaround.js",
						"scripts/admin/script.js"
					]
				}
			}
		},

		copy: {
			jsdist: {
				files: [
					{
						src: [
							'scripts/front/vendor/jquery.js',
							'scripts/front/vendor/jquery.map',
							'scripts/front/vendor/modernizr.js'
						],
						expand: true,
						dest: 'public/js',
						flatten: true,
						filter: 'isFile'
					}

				]
			}
		},

		watch: {
			styles: {
				files: ["styles/**/*.scss", "styles/**/*.css"],
				tasks: ["styles"],
				options: { spawn: false }
			},
			scripts: {
				files: ["scripts/**/*.js"],
				tasks: ["scripts"],
				options: { spawn: false }
			},
			css: {
				files: ["public/css/**/*.css"],
				options: { livereload: true }
			},
			js: {
				files: ["public/js/**/*.css"],
				options: { livereload: true }
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('styles', ['sass']);
	grunt.registerTask('scripts', ['jshint', 'uglify']);
	grunt.registerTask('default', ['styles', 'scripts', 'copy']);
};
