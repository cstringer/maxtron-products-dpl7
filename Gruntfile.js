/*global module*/
module.exports = function(grunt) {
    'use strict';

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        uglify: {
            build: {
                options: {
                    banner: '/* ©' + grunt.template.today('yyyy') + ' Maxtron Products. All rights reserved. */\n',
                    quoteStyle: 1
                },
                files:[{
                    expand: true,
                    cwd: '.',
                    dest: 'js',
                    src: ['js/*.js', '!js/*.min.js', '!js/*-min.js'],
                    rename: function(dst, src) {
                        return src.replace('.js', '.min.js');
                    }
                }]
            }
        },

        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd: 'css',
                    dest: 'css',
                    src: ['*.css', '!*.min.css'],
                    ext: '.min.css'
                }]
            }
        },

        less: {
            target: {
                files: [{
                    expand: true,
                    cwd: 'css',
                    dest: 'css',
                    src: '*.less',
                    ext: '.css'
                }]
            }
        },

        clean: {
            js: ['js/*.min.js'],
            css: ['css/*.css']
        }

    });

    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-clean');

    grunt.registerTask('buildall', ['clean', 'uglify', 'less', 'cssmin']);
    grunt.registerTask('buildless', ['clean:css', 'less', 'cssmin']);
};
