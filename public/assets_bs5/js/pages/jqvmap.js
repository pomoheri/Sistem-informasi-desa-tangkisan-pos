$(function () {
	"use strict";

	$('#map-world').vectorMap({ 
		map: 'world_en',
		backgroundColor: '#a5bfdd',
		borderColor: '#818181',
		borderOpacity: 0.25,
		borderWidth: 1,
		color: '#f4f3f0',
		enableZoom: true,
		hoverColor: '#c9dfaf',
		hoverOpacity: null,
		normalizeFunction: 'linear',
		scaleColors: ['#b6d6ff', '#005ace'],
		selectedColor: '#c9dfaf',
		selectedRegions: null,
		showTooltip: true,
		onRegionClick: function(element, code, region)
		{
			var message = 'You clicked "'
				+ region
				+ '" which has the code: '
				+ code.toUpperCase();
	
			alert(message);
		}
	});

	$('#map-usa').vectorMap({ 
		map: 'usa_en',
		backgroundColor: '#a5bfdd',
		borderColor: '#818181',
		borderOpacity: 0.25,
		borderWidth: 1,
		colors: {
            mo: '#C9DFAF',
            fl: '#C9DFAF',
            or: '#C9DFAF'
        },
		enableZoom: true,
		hoverColor: '#c9dfaf',
		hoverOpacity: null,
		normalizeFunction: 'linear',
		scaleColors: ['#b6d6ff', '#005ace'],
		selectedColor: '#c9dfaf',
		selectedRegions: null,
		showTooltip: true,
		onRegionClick: function(element, code, region)
		{
			var message = 'You clicked "'
				+ region
				+ '" which has the code: '
				+ code.toUpperCase();
	
			alert(message);
		}
	});

	$('#map-europe').vectorMap({ 
		map: 'europe_en',
		backgroundColor: '#a5bfdd',
		borderColor: '#818181',
		borderOpacity: 0.25,
		borderWidth: 1,
		colors: {
            mo: '#C9DFAF',
            fl: '#C9DFAF',
            or: '#C9DFAF'
        },
		enableZoom: true,
		hoverColor: '#c9dfaf',
		hoverOpacity: null,
		normalizeFunction: 'linear',
		scaleColors: ['#b6d6ff', '#005ace'],
		selectedColor: '#c9dfaf',
		selectedRegions: null,
		showTooltip: true,
		onRegionClick: function(element, code, region)
		{
			var message = 'You clicked "'
				+ region
				+ '" which has the code: '
				+ code.toUpperCase();
	
			alert(message);
		}
	});

	$('#map-russia').vectorMap({ 
		map: 'russia_en',
		backgroundColor: '#a5bfdd',
		borderColor: '#818181',
		borderOpacity: 0.25,
		borderWidth: 1,
		colors: {
            mo: '#C9DFAF',
            fl: '#C9DFAF',
            or: '#C9DFAF'
        },
		enableZoom: true,
		hoverColor: '#c9dfaf',
		hoverOpacity: null,
		normalizeFunction: 'linear',
		scaleColors: ['#b6d6ff', '#005ace'],
		selectedColor: '#c9dfaf',
		selectedRegions: null,
		showTooltip: true,
		onRegionClick: function(element, code, region)
		{
			var message = 'You clicked "'
				+ region
				+ '" which has the code: '
				+ code.toUpperCase();
	
			alert(message);
		}
	});

});