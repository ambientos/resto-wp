let path = require('path'),
	pathJs = '/themes/resto-service/js'
	webpack = require('webpack')

module.exports = {
	mode: 'production',
	context: __dirname + pathJs,
	entry: './site-source/index.js',
	output: {
		filename: 'site.build.js',
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