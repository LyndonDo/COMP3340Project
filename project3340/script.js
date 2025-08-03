const themeMap = {  // Theme Map For The Users To Change Theme
  "light mode": "theme-light",
  "dark mode": "theme-dark",
  "halloween theme": "theme-halloween",
  "christmas theme": "theme-christmas",
  "fall theme": "theme-fall",
  "winter theme": "theme-winter",
  "spring theme": "theme-spring",
  "summer theme": "theme-summer"
};

const games = [ // Games Map To Store Games And Display Games Images
  "ageofempires3",
  "apexlegends",
  "brawlhalla",
  "civilization",
  "destiny2",
  "honkaistarrail",
  "lifeisstrange",
  "oncehuman",
  "pubg",
  "rainboxsixseige",
  "rocketleague",
  "rougecompany",
  "sifu",
  "sims4",
  "splitgate2",
  "thefinals",
  "verdun",
  "warframe",
  "warthunder",
  "lifeisstrange2"
];

// Apply Saved Theme If It Exists
document.addEventListener('DOMContentLoaded', () => {
  const savedTheme = localStorage.getItem('selectedTheme'); // To Store The Selected Theme Whenever The Users Change The Theme
  if (savedTheme) {
    document.body.className = '';
    document.body.classList.add(savedTheme);
  }
});

// Add event listeners to theme dropdown links
document.querySelectorAll('.dropdown-content a').forEach(link => {
  link.addEventListener('click', e => {
    e.preventDefault();
    const key = link.textContent.toLowerCase().trim();
    const themeClass = themeMap[key];

    // Reset And Apply theme
    document.body.className = '';
    if (themeClass) {
      document.body.classList.add(themeClass);

      // When Users Select Any Desire Theme, It Will Be Store In The LocalStorage
      localStorage.setItem('selectedTheme', themeClass);
    }
  });
});

// The Games Images Will Be Display Randomly
for (let i = games.length - 1; i > 0; i--) {
  const j = Math.floor(Math.random() * (i + 1));
  [games[i], games[j]] = [games[j], games[i]];
}

const slides = document.querySelectorAll(".slider img"); // Stores Slides Games Images


// For Each Game Image In The Slide 
slides.forEach((img, index) => {
  const gameName = games[index];
  
  // Random Pick Of Games Images
  const randomNum = Math.floor(Math.random() * 5) + 1;
  const variationPath = `images/${gameName}-game${randomNum}.png`;


  // Checks If There Any Variation of Games Images
  img.src = variationPath;
  img.alt = `${gameName} Game`;
  img.onerror = () => {
    img.src = `images/${gameName}.png`; // Fallback If Variation Doesn't Exist
  };
});


// Randomize The Order Of Game Images 
document.addEventListener('DOMContentLoaded', () => {
  const container = document.querySelector(".games-container");
  if (!container) {
    return;
  }

  const items = Array.from(container.children);
  for (let i = items.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [items[i], items[j]] = [items[j], items[i]];
  }

  container.innerHTML = "";
  items.forEach(item => container.appendChild(item));
});

// Display Games Images That Match The Selected Genre 
document.getElementById('genre-select').addEventListener('change', function () {
  const selected = this.value;
  document.querySelectorAll('.games-container a').forEach(anchor => {
    const img = anchor.querySelector('img');
    if (!selected || img.dataset.genre === selected) {
      anchor.style.display = '';
    } else {
      anchor.style.display = 'none';
    }
  });
});


const gamesdata = { // Games Data Map To Store Data Of Games
  1: { title: "Age Of Empires", trailer: "https://www.youtube.com/embed/SSempPDd3ck?si=zPnduhWW001L8LKm", genre: "Shooter", release: "2005-10-18", cover: "ageofempires3.png" },
  2: { title: "Apex Legends", trailer: "https://www.youtube.com/embed/oQtHENM_GZU?si=EFAXaEBD6KzF_NLc", genre: "Battle Royale", release: "2019-02-04", cover: "apexlegends.png" },
  3: { title: "Brawlhalla", trailer: "https://www.youtube.com/embed/fnd71bqiiW0?si=AvYJ0PRdkJXKCZZJ", genre: "Fighting", release: "2014-04-30", cover: "brawlhalla.png" },
  4: { title: "Sid Meier's Civilization", trailer: "https://www.youtube.com/embed/5KdE0p2joJw?si=wM_ACK5B3_-457hL", genre: "Strategy", release: "2014-04-30", cover: "civilization.png" },
  5: { title: "Destiny 2", trailer: "https://www.youtube.com/embed/hdWkpbPTpmE?si=yzNrUN-0gzjins6M", genre: "Shooter", release: "2017-09-06", cover: "destiny2.png" },
  6: { title: "Honkai: Star Rail", trailer: "https://www.youtube.com/embed/w8vPZrMFiZ4?si=DpQvX6iban9ooa4d", genre: "RPG", release: "2023-04-26", cover: "honkaistarrail.png" },
  7: { title: "Life Is Strange", trailer: "https://www.youtube.com/embed/AURVxvIZrmU?si=WSUrT2kgabCGJvbO", genre: "Adventure", release: "2015-01-29", cover: "lifeistrange.png" },
  8: { title: "Life Is Strange 2", trailer: "https://www.youtube.com/embed/1xYpXzqmk8Y?si=8s-PBHftZmvuoXI0", genre: "Adventure", release: "2018-09-27", cover: "lifeisstrange2.png" },
  9: { title: "Once Human", trailer: "https://www.youtube.com/embed/XXpfbP9Ml_4?si=GNkGssVV6Yc26KSV", genre: "Survival", release: "2024-07-09", cover: "oncehuman.png" },
  10: { title: "PUBG", trailer: "https://www.youtube.com/embed/u1oqfdh4xBY?si=xpW4xlCQcSyFj6Ro", genre: "Battle Royale", release: "2017-12-20", cover: "pubg.png" },
  11: { title: "Rainbow Six Siege X", trailer: "https://www.youtube.com/embed/A0Hw96M5bC4?si=D4ikBvOOGsNTJ2jv", genre: "Shooter", release: "2015-12-01", cover: "rainboxsixsiegex.png" },
  12: { title: "Rocket League", trailer: "https://www.youtube.com/embed/SgSX3gOrj60?si=Cx5lQoUy5pbyggId", genre: "Sports", release: "2015-07-07", cover: "rocketleague.png" },
  13: { title: "Rouge Company", trailer: "https://www.youtube.com/embed/uqu8jtrNR_0?si=HjBkAA3cCjLBWJG1", genre: "Shooting", release: "2022-06-09", cover: "rougecompany.png" },
  14: { title: "Sifu", trailer: "https://www.youtube.com/embed/1FQ1YO3Ks2U?si=3xCo6KBK5_VnVihw", genre: "Fighting", release: "2021-05-03", cover: "sifu.png" },
  15: { title: "The Sims 4", trailer: "https://www.youtube.com/embed/WCVS01ZXBrk?si=UvAsTybDrSZZ850D", genre: "Simulation", release: "2014-09-02", cover: "sims4.png" },
  16: { title: "Splitgate 2", trailer: "https://www.youtube.com/embed/8zPMku7q9hU?si=nFhx-h-Cnuq7hNyJ", genre: "Shooter", release: "2025-06-06", cover: "splitgate2.png" },
  17: { title: "The Finals", trailer: "https://www.youtube.com/embed/DiSDlPc7r0g?si=OR-h7FQ5O-6FPsPb", genre: "Shooter", release: "2023-12-07", cover: "thefinals.png" },
  18: { title: "Verdun", trailer: "https://www.youtube.com/embed/kWp-7XH3080?si=s-kHRLROMwsREJuf", genre: "Shooter", release: "2013-09-19", cover: "verdun.png" },
  19: { title: "Warframe", trailer: "https://www.youtube.com/embed/MsbL8lFHrZI?si=puO28KLs1_pXMM3A", genre: "Shooter", release: "2013-03-25", cover: "warframe.png" },
  20: { title: "War Thunder", trailer: "https://www.youtube.com/embed/miVz9nsMYEw?si=C27cmFRA67-qAuLv", genre: "Shooter", release: "2013-08-15", cover: "warthunder.png" },
};

// Display Game Data Information And Check If The Game Exists Or Not
if (game) {
  document.getElementById("game-title").textContent = game.title;
  document.getElementById("game-genre").textContent = game.genre;
  document.getElementById("game-release").textContent = game.release;
  document.getElementById("game-cover").src = "images/" + game.cover;
  document.getElementById("game-trailer").src = game.trailer;
} else {
  document.getElementById("game-title").textContent = "Game not found";
  document.getElementById("game-trailer").style.display = "none";
}


