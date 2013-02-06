$ ->
	# fancybox images
	$('a.fancybox').fancybox()

#	console.log "navigator is " + navigator.userAgent
	ua = navigator.userAgent
	safari = ua.match(/Safari/) && !ua.match(/Chrome/)
	if safari
#		$('.debug').html('safari detected, degrading');
		return
#	$('.debug').html('using javascript')

	# Fake proper navigation
	if false
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
			# console.log "href #{href}, window.location #{window.location}"
			unless href == window.location.toString()
				article = $('article > div')
				article.fadeOut(200, ->
					article.load(href + '/content.html', ->
						article.fadeIn(200)
					)
				)
				window.history.pushState(href, "", href)

	window.history.pushState window.location.href, "", window.location.href
	window.onpopstate = (ev) ->
		# console.log "onpopstate #{ev.state}"
		if ev.state != null
			$('article').load(ev.state + '/content.html')

	# $('.debug').html('navi ' + navigator.userAgent);
	# hackish way to prevent scrolling
#	$(window).scroll (e) ->
#		unless navigator.userAgent.match(/(i(Pad|Phone|Pod))|Safari/)
#			$('body').scrollLeft(0)
#			e.stopPropagation()

