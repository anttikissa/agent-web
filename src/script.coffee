$ ->
	# Fake proper navigation
	topLevels = $('nav > ul > li')
	$('nav > ul > li').click ->
		$(topLevels).each (idx, it) =>
			if it == this
				$(this).addClass 'current'
			else
				$(it).removeClass 'current'
