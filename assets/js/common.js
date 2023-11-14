// POST FILTER
document.addEventListener("DOMContentLoaded", function () {
  var categoryFilter = document.getElementById("category-filter");
  var postsContainer = document.getElementById("posts-container");

  if (categoryFilter && postsContainer) {
    categoryFilter.addEventListener("change", function () {
      var selectedCategory = categoryFilter.value;
      var ajaxUrl = '<?php echo admin_url("admin-ajax.php"); ?>';
      var xhr = new XMLHttpRequest();
      xhr.open("POST", ajaxurl, true);
      xhr.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded; charset=UTF-8"
      );
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          postsContainer.innerHTML = xhr.responseText; // Aggiorna il contenuto dei post
        }
      };
      var data =
        "action=filter_posts&category=" + encodeURIComponent(selectedCategory);
      xhr.send(data);
    });
  }
});

document.addEventListener("DOMContentLoaded", function (event) {
  Splitting();
  const words = [...document.querySelectorAll(".word")];
  const title = document.querySelector(".kv__lead");
  words.forEach((word) => gsap.set(word.parentNode, { perspective: 1000 }));

  let introAnim = gsap.timeline({});
  introAnim
    .fromTo(
      words,
      {
        "will-change": "opacity, transform",
        z: () => gsap.utils.random(500, 950),
        opacity: 0,
        xPercent: (pos) => gsap.utils.random(-100, 100),
        yPercent: (pos) => gsap.utils.random(-10, 10),
        rotationX: () => gsap.utils.random(-90, 90),
      },
      {
        ease: "expo",
        duration: 2.5,
        opacity: 1,
        rotationX: 0,
        rotationY: 0,
        xPercent: 0,
        yPercent: 0,
        z: 0,
        //   scrollTrigger: {
        //     trigger: title,
        //     start: "center center",
        //     end: "+=300%",
        //     scrub: true,
        //     pin: title.parentNode,
        //   },
        stagger: {
          each: 0.006,
          from: "random",
        },
      }
    )
    .to(words, {
      duration: 1,
      opacity: 0.2,
    })
    .from(".kv__single", {
      opacity: 0,
    });

  let introScroll = gsap.timeline({
    scrolltrigger: {
      trigger: ".kv",
      start: "bottom center",
      end: "+=300%",
      scrub: true,
      pin: ".kv",
      markers: true,
    },
  });

  // introScroll.
  //   to(".kv__single", {
  //     opacity: 0,
  //   });
  //   .fromTo(
  //     words,
  //     {
  //       "will-change": "opacity, transform",
  //       opacity: 1,
  //       rotationX: 0,
  //       rotationY: 0,
  //       xPercent: 0,
  //       yPercent: 0,
  //       z: 0,
  //     },
  //     {
  //       ease: "expo",
  //       duration: 2.5,
  //       z: () => gsap.utils.random(500, 950),
  //       opacity: 0,
  //       xPercent: (pos) => gsap.utils.random(-100, 100),
  //       yPercent: (pos) => gsap.utils.random(-10, 10),
  //       rotationX: () => gsap.utils.random(-90, 90),
  //       stagger: {
  //         each: 0.006,
  //         from: "random",
  //       },
  //     }
  //   );

  ////////
});

///////// FADE IN /////////

const fadeItems = gsap.utils.toArray(".fadeIn");

fadeItems.forEach((fadeItem, i) => {
  const anim = gsap.fromTo(
    fadeItem,
    {
      duration: 1,
      opacity: 0,
      "--x": 0,
      "--y": 0,
      "--angle": "180deg",
      stagger: 1,
    },
    {
      // repeat: -1,
      opacity: 1,
      "--x": 1,
      "--y": 1,
      "--angle": "360deg",
      delay: 0.06 * i, // Stagger diverso per ciascun elemento
    }
  );
  ScrollTrigger.create({
    trigger: fadeItem,
    start: "top center",
    //   start: "-80%",
    animation: anim,
    toggleActions: "play none none none",
    once: true,
    markers: true,
  });
});
