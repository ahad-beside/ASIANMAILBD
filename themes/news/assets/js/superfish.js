!function(s){s.fn.superfish=function(a){var i=s.fn.superfish,e=i.c,n=s(['<span class="',e.arrowClass,'"> &#187;</span>'].join("")),o=function(){var a=s(this),i=r(a);clearTimeout(i.sfTimer),a.showSuperfishUl().siblings().hideSuperfishUl()},t=function(){var a=s(this),e=r(a),n=i.op;clearTimeout(e.sfTimer),e.sfTimer=setTimeout(function(){n.retainPath=s.inArray(a[0],n.$path)>-1,a.hideSuperfishUl(),n.$path.length&&a.parents(["li.",n.hoverClass].join("")).length<1&&o.call(n.$path)},n.delay)},r=function(s){var a=s.parents(["ul.",e.menuClass,":first"].join(""))[0];return i.op=i.o[a.serial],a},h=function(s){s.addClass(e.anchorClass).append(n.clone())};return this.each(function(){var n=this.serial=i.o.length,r=s.extend({},i.defaults,a);r.$path=s("li."+r.pathClass,this).slice(0,r.pathLevels).each(function(){s(this).addClass([r.hoverClass,e.bcClass].join(" ")).filter("li:has(ul)").removeClass(r.pathClass)}),i.o[n]=i.op=r,s("li:has(ul)",this)[s.fn.hoverIntent&&!r.disableHI?"hoverIntent":"hover"](o,t).each(function(){r.autoArrows&&h(s(">a:first-child",this))}).not("."+e.bcClass).hideSuperfishUl();var l=s("a",this);l.each(function(s){l.eq(s).parents("li")}),r.onInit.call(this)}).each(function(){var a=[e.menuClass];!i.op.dropShadows||s.browser.msie&&s.browser.version<7||a.push(e.shadowClass),s(this).addClass(a.join(" "))})};var a=s.fn.superfish;a.o=[],a.op={},a.IE7fix=function(){var i=a.op;s.browser.msie&&s.browser.version>6&&i.dropShadows&&void 0!=i.animation.opacity&&this.toggleClass(a.c.shadowClass+"-off")},a.c={bcClass:"sf-breadcrumb",menuClass:"sf-js-enabled",anchorClass:"sf-with-ul",arrowClass:"sf-sub-indicator",shadowClass:"sf-shadow"},a.defaults={hoverClass:"sfHover",pathClass:"overideThisToUse",pathLevels:2,delay:1e3,animation:{height:"show"},speed:"normal",autoArrows:!1,dropShadows:!1,disableHI:!1,easing:"swing",onInit:function(){},onBeforeShow:function(){},onShow:function(){},onHide:function(){}},s.fn.extend({hideSuperfishUl:function(){var i=a.op,e=i.retainPath===!0?i.$path:"";i.retainPath=!1;var n=s(["li.",i.hoverClass].join(""),this).add(this).not(e).removeClass(i.hoverClass).find(">ul").hide();return i.onHide.call(n),this},showSuperfishUl:function(){var s=a.op,i=(a.c.shadowClass+"-off",this.not(".accorChild").addClass(s.hoverClass).find(">ul:hidden"));return a.IE7fix.call(i),s.onBeforeShow.call(i),i.animate(s.animation,s.speed,s.easing,function(){a.IE7fix.call(i),s.onShow.call(i)}),this}})}(jQuery);