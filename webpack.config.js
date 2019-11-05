let path = require('path'),
	pathJs = '/themes/resto-service/js'

module.exports = {
	mode: 'production',
	context: __dirname + pathJs,
	entry: './site-source/index.js',
	output: {
		filename: 'site.build.js',
		path: path.resolve(__dirname) + pathJs
	}
}