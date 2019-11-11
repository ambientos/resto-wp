let path = require('path'),
	webpack = require('webpack'),
	pathJs = '/themes/resto-service/js'

module.exports = {
	mode: 'production',
	context: __dirname + pathJs,
	entry: {
		fancybox: './src/fancybox/index.js',
		'owl-carousel': './src/owl-carousel/index.js',
		bootstrap: './src/bootstrap/index.js',
		site: './src/site/index.js'
	},
	output: {
		filename: '[name].build.js',
		path: path.resolve(__dirname) + pathJs
	},
	module: {
		rules: [{
			test: /\.js$/,
			exclude: /node_modules/,
			use: {
				loader: 'babel-loader',
				options: {
					presets: ['@babel/preset-env']
				}
			}
		}]
	},
	plugins: [
		new webpack.ProvidePlugin({
			$: 'jquery',
			jQuery: 'jquery',
			'window.jQuery': 'jquery'
		})
	],
	externals: {
		'jquery': 'jQuery'
	}
}