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