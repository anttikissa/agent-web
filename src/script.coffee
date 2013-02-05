$ ->
	# Fake proper navigation
	primaries = $('nav > ul > li > a')
	primaries.click (ev) ->
		ev.preventDefault()

		# console.log "primary click"
		$(primaries).each (idx, it) =>
			if it == this
				$(this).parent().addClass 'current'
			else
				$(it).parent().removeClass 'current'

		href = this.href
		$('article').load(href + '/content.html')
		window.history.pushState(href, "", href)

	# fancybox images
	$('a.fancybox').fancybox()
	
