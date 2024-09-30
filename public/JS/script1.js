document.addEventListener("DOMContentLoaded", () => {
    const initSlider = () => {
        const sliderWrappers = document.querySelectorAll(".slider-wrapper, .slider-wrapper-2");
        const slideScrollbar = document.querySelector(".slider-scrollbar");
        const scrollbarThumb = slideScrollbar.querySelector(".scrollbar-thumb");

        let activeImageList = null; // Variable to track the currently active image list

        // Function to check screen width and hide buttons if necessary
        const checkScreenWidthAndHideButtons = (buttons) => {
            if (window.innerWidth <= 1280) {
                buttons.forEach(button => button.style.display = 'none');
            }
        };

        // Function to update the maximum scroll position
        const updateMaxScrollLeft = (list) => {
            return list.scrollWidth - list.clientWidth;
        };

        // Show or hide slide buttons based on scroll position and screen width
        const handleSlideButtons = (list, maxScrollLeft) => {
            const buttons = list.parentElement.querySelectorAll(".slide-button");
            
            // Check screen width
            checkScreenWidthAndHideButtons(buttons);
            
            if (window.innerWidth > 1280) {
                buttons[0].style.display = list.scrollLeft <= 0 ? "none" : "block";
                buttons[1].style.display = list.scrollLeft >= maxScrollLeft ? "none" : "block";
            }
        };

        // Update the scrollbar thumb position based on the scroll position
        const updateScrollPosition = (list, maxScrollLeft) => {
            const scrollPosition = list.scrollLeft;
            const thumbPosition = (scrollPosition / maxScrollLeft) * (slideScrollbar.clientWidth - scrollbarThumb.offsetWidth);
            scrollbarThumb.style.left = `${thumbPosition}px`;
        };

        const initScrollbarDrag = (list) => {
            const maxScrollLeft = updateMaxScrollLeft(list);

            const handleMouseMove = (event, startX, thumbStartPos) => {
                const deltaX = event.clientX - startX;
                let newThumbPosition = thumbStartPos + deltaX;

                // Ensure the thumb stays within the scrollbar
                newThumbPosition = Math.max(0, Math.min(newThumbPosition, slideScrollbar.clientWidth - scrollbarThumb.offsetWidth));

                // Update the thumb position
                scrollbarThumb.style.left = `${newThumbPosition}px`;

                // Update the scroll position of the image list based on the thumb position
                const newScrollLeft = (newThumbPosition / (slideScrollbar.clientWidth - scrollbarThumb.offsetWidth)) * maxScrollLeft;
                list.scrollLeft = newScrollLeft;
            };

            scrollbarThumb.addEventListener("mousedown", (event) => {
                event.preventDefault(); // Prevent text selection during drag
                const startX = event.clientX;
                const thumbStartPos = scrollbarThumb.offsetLeft;

                const onMouseMove = (event) => handleMouseMove(event, startX, thumbStartPos);
                const onMouseUp = () => {
                    document.removeEventListener("mousemove", onMouseMove);
                    document.removeEventListener("mouseup", onMouseUp);
                };

                document.addEventListener("mousemove", onMouseMove);
                document.addEventListener("mouseup", onMouseUp);
            });
        };

        // Initialize slide buttons to scroll half the width of the slider
        const initSlideButtons = (list) => {
            const maxScrollLeft = updateMaxScrollLeft(list);

            const buttons = list.parentElement.querySelectorAll(".slide-button");
            checkScreenWidthAndHideButtons(buttons);

            buttons.forEach(button => {
                button.addEventListener("click", () => {
                    const direction = button.id.includes("prev") ? -1 : 1;
                    const scrollAmount = (list.clientWidth / 2) * direction; // Scroll by half the width of the visible area
                    list.scrollBy({ left: scrollAmount, behavior: "smooth" });
                });
            });

            list.addEventListener("scroll", () => {
                handleSlideButtons(list, maxScrollLeft);
                updateScrollPosition(list, maxScrollLeft);
            });

            // Initial setup
            handleSlideButtons(list, maxScrollLeft);
            updateScrollPosition(list, maxScrollLeft);
        };

        // Update scrollbar and slide buttons for a given list
        const updateSliderControls = (list) => {
            const maxScrollLeft = updateMaxScrollLeft(list);
            initSlideButtons(list);
            initScrollbarDrag(list);
            handleSlideButtons(list, maxScrollLeft);
            updateScrollPosition(list, maxScrollLeft);
        };

        // Initialize sliders for both slider-wrapper and slider-wrapper-2
        sliderWrappers.forEach(wrapper => {
            const imageList = wrapper.querySelector(".image-list, .image-list-2");
            if (imageList) {
                updateSliderControls(imageList); // Initialize controls for each list
                if (!activeImageList) {
                    activeImageList = imageList; // Set the initial active image list
                }
            }
        });

        // Update scrollbar based on active image list
        const updateActiveSlider = (newActiveList) => {
            if (activeImageList !== newActiveList) {
                activeImageList = newActiveList;
                updateSliderControls(activeImageList); // Update controls when changing slides
            }
        };

        // Event listener for tabs or any interaction that changes active image list
        document.querySelectorAll('.tab-container button').forEach(button => {
            button.addEventListener('click', (event) => {
                const targetSlide = document.querySelector(`.${button.getAttribute('data-target')}`);
                if (targetSlide) {
                    // Set display of all image lists to 'none' and then display the target slide
                    document.querySelectorAll('.image-list').forEach(list => list.style.display = 'none');
                    targetSlide.style.display = 'flex'; // Show the new target slide
                    updateActiveSlider(targetSlide);
                }
            });
        });
    };

    initSlider();
});
