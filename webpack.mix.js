const directories = [
    "index",
    "login",
    "top"
];

const mix = require('laravel-mix');
const CompressionPlugin = require("compression-webpack-plugin");

mix.webpackConfig({
    resolve: {
        extensions: [".js", ".jsx", ".vue", ".ts", ".tsx"],
        alias: {
            vue$: "vue/dist/vue.esm-bundler.js"
        }
    },
    optimization: {
        minimize: true
    },
    plugins: [
        // Vueの機能フラグを設定するためのDefinePlugin
        new (require('webpack')).DefinePlugin({
            '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': JSON.stringify(false)  // オフにする場合
        }),
        new CompressionPlugin({
            test: /\.(css)|(js)$/,
            compressionOptions: {
                level: 9
            }
        })
    ],
    module: {
        rules: [
            {
                test: /\.tsx?$/,
                loader: "ts-loader",
                options: { appendTsSuffixTo: [/\.vue$/] },
                exclude: /node_modules/
            }
        ]
    }
});

for (let i = 0; i < directories.length; i++) {
    mix.sass("resources/sass/" + directories[i] + "/index.scss", "public/css/build/" + directories[i] + "/index.css")
        .js("resources/js/" + directories[i] + "/*.js", "public/js/build/" + directories[i] + "/index.js").vue({
            options: {
                compilerOptions: {
                    isCustomElement: (tag) => ['md-linedivider'].includes(tag),
                },
            },
        });
}
