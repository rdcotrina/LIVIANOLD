/*
 ---

 script: require_with_versioning.js

 description: core css and js asset loading functionality, builds on mootools ASSET

 extra feature:	added versioning functionality for JS & CSS scripts

 copyright: (c) 2014 Contributors in (/AUTHORS.txt).

 license: MIT-style license in (/MIT-LICENSE.txt).

 requires:
 - MochaUI/MUI
 - Core/Request
 - More/Hash
 - More/Assets 
 - More/URI

 provides: [MUI.Require, Asset.css ]
 
 NOTE: Before using this script, please read VERSIONING.txt for adicional instructions,
 	otherwise use require.js instead.
 
 ...
 */

MUI.Require = new Class({

	Implements: [Options],

	options: {
		css: [],
		images: [],
		js: [],
        noCache: false
		//onload: null
	},

	initialize: function(options){
		this.setOptions(options);
		options = this.options;

		this.assetsToLoad = options.css.length + options.images.length + options.js.length;
		this.assetsLoaded = 0;

		var cssLoaded = 0;

		// Load CSS before images and JavaScript

		if (options.css.length){
			options.css.each(function(sheet){

				this.getAsset(sheet, function(){
					if (cssLoaded == options.css.length - 1){
						if (this.assetsLoaded == this.assetsToLoad - 1) this.requireOnload();
						else {
							// Add a little delay since we are relying on cached CSS from XHR request.
							this.assetsLoaded++;
							this.requireContinue.delay(50, this);
						}
					} else {
						cssLoaded++;
						this.assetsLoaded++;
					}
				}.bind(this));
			}.bind(this));
		} else if (!options.js.length && !options.images.length){
			if (typeof this.options.onload == 'function'){
				this.options.onload();
			}
			return true;
		} else this.requireContinue.delay(50, this); // Delay is for Safari
	},

	requireOnload: function(){
		this.assetsLoaded++;
		if (this.assetsLoaded == this.assetsToLoad){
			if (typeof this.options.onload == 'function'){
				this.options.onload();
			}
			return true;
		}
	},

	requireContinue: function(){
		var options = this.options;
		if (options.images.length){
			options.images.each(function(image){
				this.getAsset(image, this.requireOnload.bind(this));
			}.bind(this));
		}

		if (options.js.length){
			options.js.each(function(script){
				this.getAsset(script, this.requireOnload.bind(this));
			}.bind(this));
		}
	},

	getAsset: function(source, onload){
		// If the asset is loaded, fire the onload function.
		if (MUI.files[source] == 'loaded'){
			if (typeof onload == 'function'){
				onload(source);
			}
			return true;
		}

		// If the asset is loading, wait until it is loaded and then fire the onload function.
		// If asset doesn't load by a number of tries, fire onload anyway.
		else if (MUI.files[source] == 'loading'){
			var tries = 0;
			var checker = (function(){
				tries++;
				if (MUI.files[source] == 'loading' && tries < 100) return;
				clearInterval(checker);
				if (typeof onload == 'function'){
					onload(source);
				}
			}).periodical(50);
		} else {  // If the asset is not yet loaded or loading, start loading the asset.
			MUI.files[source] = 'loading';

			var properties = {
				'onload': onload != 'undefined' ? onload : null
			};

			// Add to the onload function
			var oldonload = properties.onload;
			properties.onload = function(){
				MUI.files[source] = 'loaded';
				if (typeof oldonload == 'function') {
					oldonload(source);
				}
			}.bind(this);
			                                                
      var sourcePath = MUI.replacePaths(source);
      var dir = new URI().get("directory");
      var version = "file="+dir+sourcePath;

      new Request({
        url: 'autoversion.php',
        onSuccess: function(response) {
          sourcePath = response;
          var sourceURI = new URI(sourcePath);

          switch (sourceURI.get('file').match(/(?:\.([^.]+))?$/)[0]){
            case '.js': return Asset.javascript(sourcePath, properties);
            case '.css': return Asset.css(sourcePath, properties);
            case '.jpg':
            case '.png':
            case '.gif': return Asset.image(sourcePath, properties);
          }
          alert('The required file "' + sourcePath + '" could not be loaded');
        }
      }).send(version);
		}
	}
});

Object.append(Asset, {
	// Get the CSS with XHR before appending it to document.head so that we can have an onload callback.
	css: function(source, properties){
		properties = Object.append({
			id: null,
			media: 'screen',
			onload: null
		}, properties);

		new Request({
			method: 'get',
			url: source,
			onComplete: function(){
				newSheet = new Element('link', {
					'id': properties.id,
					'rel': 'stylesheet',
					'media': properties.media,
					'type': 'text/css',
					'href': source
				}).inject(document.head);
				if (typeOf(properties.onload) == 'function') properties.onload();
			}.bind(this),
			onFailure: function(){
			},
			onSuccess: function(){
			}.bind(this)
		}).send();
	},

	getCSSRule: function(selector){
		for (var ii = 0; ii < document.styleSheets.length; ii++){
			var mySheet = document.styleSheets[ii];
			var myRules = mySheet.cssRules ? mySheet.cssRules : mySheet.rules;
			selector=selector.toLowerCase();
			for (var i = 0; i < myRules.length; i++){
				if (myRules[i].selectorText.toLowerCase() == selector){
					return myRules[i];
				}
			}
		}
		return false;
	}
});
