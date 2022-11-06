import webpack from 'webpack-stream';

export const front_js = () => {
    return app.gulp.src(app.path.src.front_js, { sourcemaps: app.isDev })
        .pipe(app.plugins.plumber(
            app.plugins.notify.onError({
                title: "Ошибка в JS",
                message: "Текст ошибки: <%= error.message %>",
            })
        ))
        .pipe(webpack({
            mode: app.isBuild ? 'production' : 'development',
            resolve: {
                fallback: {
                    "stream": false,
                } 
            },
            output: {
                filename: "front.min.js"
            }
        }))
        .pipe(app.gulp.dest(app.path.build.js))
        .pipe(app.plugins.browsersync.stream());
}