$ ->
	# Fake proper navigation
	primaries = $('nav > ul > li')
	primaries.click ->
		console.log "primary click"
		$(primaries).each (idx, it) =>
			if it == this
				$(this).addClass 'current'
				$(this).find('li').removeClass 'current'
				$(this).find('li:first').addClass 'current'
			else
				$(it).removeClass 'current'
	
	secondaries = primaries.find('li')
	secondaries.click (ev) ->
		console.log "secondary click"
		$(secondaries).each (idx, it) =>
			if it == this
				$(this).addClass 'current'
			else
				$(it).removeClass 'current'
		ev.stopPropagation()

	
