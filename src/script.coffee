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

	window.history.pushState window.location.href, "", window.location.href
	window.onpopstate = (ev) ->
		if ev.state != null
			$('article').load(ev.state + '/content.html')
		
	# hackish way to prevent scrolling
	$(window).scroll (e) ->
		$('body').scrollLeft(0)
		e.stopPropagation()
 
#		console.log $('body').scrollLeft()
