
const path = require('path');
const webpack = require('webpack');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const cssnano = require('cssnano');
const postcssPresetEnv = require('postcss-preset-env');

const JS_DIR = path.resolve(__dirname, 'src/js');
const CSS_DIR = path.resolve(__dirname, 'src/css');
const BUILD_DIR = path.resolve(__dirname, 'build');


const entry = {
    // JavaScript Files
    homeJs: JS_DIR + '/webpack/home.js',
    aboutJs: JS_DIR + '/webpack/about.js',
    blogJs: JS_DIR + '/webpack/blog.js',
    projectJs: JS_DIR + '/webpack/project.js',
    generalJs: JS_DIR + '/general.js',
    adminJs: JS_DIR + '/admin.js',


    // CSS Files

    homeCss: CSS_DIR + '/webpack/home.js',
    Css404: CSS_DIR + '/webpack/404.js',
    aboutCss: CSS_DIR + '/webpack/about.js',
    blogCss: CSS_DIR + '/webpack/blog.js',
    contactCss: CSS_DIR + '/webpack/contact.js',
    generalCss: CSS_DIR + '/webpack/general.js',
    partnersCss: CSS_DIR + '/webpack/partners.js',
    pricingCss: CSS_DIR + '/webpack/pricing.js',
    projectCss: CSS_DIR + '/webpack/project.js',
    searchCss: CSS_DIR + '/webpack/search.js',
    serviceCss: CSS_DIR + '/webpack/service.js',
    teamCss: CSS_DIR + '/webpack/team.js',
    icons: CSS_DIR + '/webpack/icons.js',
    adminCss: CSS_DIR + '/webpack/admin.js'

}
const output = {
    path: BUILD_DIR,
    filename: '[name].js'
}
const rules = [
    {
        test: /\.js$/,
        include: JS_DIR,
        exclude: /node_modules/,
        use: 'babel-loader',

    },
    {
        test: /\.css$/,
        exclude: /node_modules/,
        use: [MiniCssExtractPlugin.loader,
            'css-loader',
        {
            loader: 'postcss-loader',
            options: {
                postcssOptions: {
                    plugins: [
                        postcssPresetEnv(),
                        cssnano({ preset: 'default', discardComments: { removeAll: true } })
                    ],
                },
            },
        }

        ],
    },
    {
        test: /\.eot(\?v=\d+.\d+.\d+)?$/,
        type: 'asset/resource',
    },
    {
        test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
        type: 'asset/resource',
    },
    {
        test: /\.[ot]tf(\?v=\d+.\d+.\d+)?$/,
        type: 'asset/resource',
    },
    {
        test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
        use: [
            {
                loader: 'url-loader',
                options: {
                    limit: 10000,
                    mimetype: 'image/svg+xml',
                    name: '[path][name].[ext]',
                },
            },
        ],
    },
    {
        test: /\.ttf$/,
        type: 'asset/resource',
        dependency: { not: ['url'] },
    },
    {
        test: /\.(jpe?g|png|gif|ico)$/i,
        use: [
            {
                loader: 'file-loader',
                options: {
                    name: '[path][name].[ext]',
                },
            },
        ],
    },
    {
        test: /\.(jpe?g|svg|png|gif|ico|eot|woff2?)(\?v=\d+\.\d+\.\d+)?$/i,
        type: 'asset/resource',
    }

]
const plugins = (argv) => [
    new CleanWebpackPlugin({
        cleanStaleWebpackAssets: ('production' === argv.mode),
    }),
    new webpack.ProvidePlugin({
        $: "jquery",
        jQuery: "jquery",
        "window.jQuery": "jquery"
    }),
    new MiniCssExtractPlugin({
        filename: 'css/[name].css'
    }),
]
module.exports = (env, argv) => ({
    entry: entry,
    output: output,
    devtool: 'source-map',
    module: {
        rules: rules,
    },
    plugins: plugins(argv),
    optimization: {
        minimizer: [
            new UglifyJsPlugin({
                cache: false,
                parallel: true,
                sourceMap: false,
                extractComments: true,
            }),
            new OptimizeCssAssetsPlugin()
        ]
    },
    stats: {
        errorDetails: true
    },
    resolve: {
        extensions: ['.ts', '.js'],
        modules: ['src/javascript', 'node_modules'],
    },
    externals: {
        jquery: 'jQuery'
    }
});