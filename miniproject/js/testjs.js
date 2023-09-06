document.addEventListener("DOMContentLoaded", function () {
    const section2 = document.querySelector(".section-2");
    const scrollingText = document.querySelector(".scrolling-text");

    window.addEventListener("scroll", () => {
        const scrollY = window.scrollY;
        const section2Top = section2.getBoundingClientRect().top;
        const section2Height = section2.clientHeight;
        const scrollingTextHeight = scrollingText.clientHeight;
        const stopPosition = section2Top + scrollingTextHeight;

        if (scrollY >= section2Top && scrollY <= stopPosition) {
            const textOffset = scrollY - section2Top;
            scrollingText.style.transform = `translateY(${textOffset}px)`;
        }
    });
});
