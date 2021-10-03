const DIRECTION = { PREV: 1, NEXT: 2 };
$(document).ready(function () {
    $('._menu').each(function (index, containerItem) {
        var $gallery = $(containerItem).find('._menu-content');
        const simpleBar = new SimpleBar($gallery[0], {
            autoHide: true,
            scrollbarMaxSize: 50
        });

        var $scroller = $(simpleBar.getScrollElement());
        $(containerItem).find('.scrollLeft').on('click', function () {
            scroll(DIRECTION.PREV, $scroller);
            event.preventDefault(); // prevents anchor jump on click
        });
        $(containerItem).find('.scrollRight').on('click', function () {
            scroll(DIRECTION.NEXT, $scroller);
            event.preventDefault();
        });
        $scroller.scroll(function () {
            setButtonsVisibility($scroller);
        });
    });
});

function scroll(direction, $scroller) {
    var $active = $scroller.find('.active');
    var $target = direction == DIRECTION.PREV ? $active.prev() : $active.next();
    if ($target.length) {
        $scroller.animate({
            scrollLeft: $target[0].offsetLeft
        }, 500);
        $active.removeClass('active');
        $target.addClass('active');
    }
}
function setButtonsVisibility($scroller) {
    var scrollLeft = $scroller.scrollLeft();
    isScrollerStart($scroller, scrollLeft);
    isScrollerEnd($scroller, scrollLeft);
}
function isScrollerStart($scroller, scrollLeft, $button) {
    var $prevButton = $scroller.closest('._menu').find('.scrollLeft');
    if (scrollLeft == 0) {
        $prevButton.css('visibility', 'hidden');
    } else {
        $prevButton.css('visibility', 'visible');
    }
}
function isScrollerEnd($scroller, scrollLeft) {
    var $nextButton = $scroller.closest('._menu').find('.scrollRight');
    var scrollWidth = $scroller[0].scrollWidth; // entire width
    var scrollerWidth = $scroller.outerWidth()  // visible width
    if (scrollLeft >= scrollWidth - scrollerWidth) {
        $nextButton.css('visibility', 'hidden');
    } else {
        $nextButton.css('visibility', 'visible');
    }
}