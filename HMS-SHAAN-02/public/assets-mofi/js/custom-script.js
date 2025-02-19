// you can add your custom script here

// popover
// var exampleEl = document.getElementsByClassName(".example-popover");
// var popover = new bootstrap.Popover(exampleEl, options);

// myPopover.show();

// document.addEventListener("DOMContentLoaded", function () {
//     let pageWrapper = document.getElementById("pageWrapper");
//     let contentWrapper = document.querySelector(".simplebar-wrapper .simplebar-content-wrapper");
//     let activeLink = document.querySelector(".simplebar-wrapper .simplebar-content-wrapper a.active");
  
//     if (pageWrapper && pageWrapper.classList.contains("compact-wrapper") && contentWrapper && activeLink) {
//       let activeOffset = activeLink.getBoundingClientRect().top + window.scrollY; // Get active link position
  
//       contentWrapper.scrollTo({
//         top: activeOffset - 400,
//         behavior: "smooth",
//       });
//     }
//   });

// document.addEventListener("DOMContentLoaded", function () {
//     // Get all sidebar links with submenus
//     let sidebarLinks = document.querySelectorAll(".sidebar-link.sidebar-title");

//     sidebarLinks.forEach(function (link) {
//         link.addEventListener("click", function (event) {
//             event.preventDefault(); // Prevent default behavior

//             let parentLi = link.closest("li"); // Find closest parent <li>
//             let submenu = parentLi.querySelector(".sidebar-submenu");

//             if (submenu) {
//                 // Toggle active class
//                 submenu.classList.toggle("active");

//                 // Expand/Collapse animation
//                 if (submenu.style.maxHeight) {
//                     submenu.style.maxHeight = null;
//                 } else {
//                     submenu.style.maxHeight = submenu.scrollHeight + "px";
//                 }
//             }
//         });
//     });

//     // Highlight active submenu item
//     let currentUrl = window.location.href;
//     let submenuLinks = document.querySelectorAll(".sidebar-submenu a");

//     submenuLinks.forEach(function (submenuLink) {
//         if (submenuLink.href === currentUrl) {
//             submenuLink.classList.add("active"); // Add active class
//             submenuLink.closest(".sidebar-submenu").style.maxHeight = submenuLink.closest(".sidebar-submenu").scrollHeight + "px"; // Keep it open
//         }
//     });

//     // Auto-scroll to active menu item
//     let activeLink = document.querySelector(".sidebar-submenu a.active");
//     if (activeLink) {
//         activeLink.scrollIntoView({ behavior: "smooth", block: "center" });
//     }
// });

  
