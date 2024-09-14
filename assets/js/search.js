document.addEventListener('DOMContentLoaded', function () {
    const searchBar = document.getElementById('searchBar');
    const resultsContainer = document.getElementById('results');

    // Move the Books array outside the event listener
    const Books = [
        {   name: 'I am Malala', 
            imageUrl: './Bookimg/Book1.png', 
            isFree: true 
        },
        {
            name: 'Harry Potter and the Prisoner of Azkaban',
            imageUrl: './Bookimg/Fantasy/Harry Potter And The Prisoner of Azkaban.png',
            price: ' ₹325',
            isFree: false
        },
        {
            name: 'Harry Potter and the Deathly Hallows',
            imageUrl: './Bookimg/Fantasy/Harry Potter And The Deathly Hallows.png',
            price: ' ₹325',
            isFree: false

        },
        {
            name: 'Harry Potter and The Chamber of Secrets',
            imageUrl: './Bookimg/Fantasy/Harry Potter And The Chamber of Secrets.png',
            price: ' ₹325',
            isFree: false
        },
        {
            name: 'Harry Potter and The Half Blood Prince',
            imageUrl: './Bookimg/Fantasy/Harry Potter And The Half-Blood Prince.png',
            price: ' ₹325',
            isFree: false
        },
        {
            name: 'Harry Potter and The Order of Phoenix',
            imageUrl: './Bookimg/Fantasy/Harry Potter And The Order of The Phoenix.png',
            price: ' ₹325',
            isFree: false
        },
        {
            name: 'Harry Potter and The Goblet of Fire',
            imageUrl: './Bookimg/Fantasy/Harry Potter And The Goblet of Fire.png',
            isFree: true
        },
        {
            name: 'Harry Potter and The Sorcerers Stone',
            imageUrl: './Bookimg/Fantasy/Harry Potter And The Sorcerers Stone.png',
            price: ' ₹325',
            isFree: false
        },
        {
            name: 'Book of Shadows',
            imageUrl: './Bookimg/Fantasy/Book-of-Shadows.png',
            isFree: true
        },
        {
            name: 'The Arabian Nights',
            imageUrl: './Bookimg/Fantasy/The-Arabian-Nights.png',
            isFree: true
        },
        {
            name: 'The Time Machine',
            imageUrl : './Bookimg/Fantasy/The-Time-Machine.png',
            isFree: true
        },
        {
            name: 'American Prometheus',
            imageUrl: './Bookimg/Autob/American prometheus.jpg',
            price: ' ₹325',
            isFree: false
        },
        {
            name: 'Dreams From My Father',
            imageUrl: './Bookimg/Autob/Dreams From My Father.jpg',
            isFree: true
        },
        {
            name: 'My Brief History',
            imageUrl: './Bookimg/Autob/My Brief History.jpg',
            price: ' ₹325',
            isFree: false
        },
        {
            name: 'Steve Jobs',
            imageUrl: './Bookimg/Autob/Steve Jobs.png',
            isFree: true
        },
        {
            name: 'The Diary of A Young Girl',
            imageUrl: './Bookimg/Autob/The Diary of a Young Girl.jpg',
            isFree: true
        },
        {
            name: 'The Race of My Life',
            imageUrl: './Bookimg/Autob/the rase of my life.jpg',
            isFree: true
        },
        {
            name: 'The Story of My Experiments with the Truth',
            imageUrl: './Bookimg/Autob/The story of my experiments with truth.jpg',
            isFree: true
        },
        {
            name: 'Wings of Fire',
            imageUrl: './Bookimg/Autob/Wings of fire.jpg',
            price: ' ₹325',
            isFree: false
        },
        {
            name: 'At the Mountains of Madness',
            imageUrl: './Bookimg/Horror/at-the-mountains-of-madness.jpg',
            price: ' ₹325',
            isFree: false 
        },
        {
            name: 'Clarimonde',
            imageUrl: './Bookimg/Horror/clarimonde.jpg',
            isFree: true
        },
        {
            name: 'Collected Works of Poe',
            imageUrl: './Bookimg/Horror/Collected-Works-of-Poe.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'Color out of Space',
            imageUrl: './Bookimg/Horror/Color-Out-of-Space.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'Dracula',
            imageUrl: './Bookimg/Horror/Dracula.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'The Best Ghost Stories',
            imageUrl: './Bookimg/Horror/The-Best-Ghost-Stories.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'The Dunwich Horror',
            imageUrl: './Bookimg/Horror/The-Dunwich-Horror.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'The Phantom of The Opera',
            imageUrl: './Bookimg/Horror/The-Phantom-of-the-Opera.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'The Shadow Over Innsmouth',
            imageUrl: './Bookimg/Horror/The-Shadow-Over-Innsmouth.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'The Yellow Wallpaper',
            imageUrl: './Bookimg/Horror/The-Yellow-Wallpaper.jpg',
            isFree: true
        },
        {
            name: 'Emma',
            imageUrl: './Bookimg/Romance/emma.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'Healing Her Heart',
            imageUrl: './Bookimg/Romance/healing-her-heart.jpg',
            isFree: true
        },
        {
            name: 'Little Women',
            imageUrl: './Bookimg/Romance/little-women.jpg',
            isFree: true
        },
        {
            name: 'Mademoiselle At Arms',
            imageUrl: './Bookimg/Romance/Mademoiselle-At-Arms.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'Persuasion',
            imageUrl: './Bookimg/Romance/Persuasion.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'Romeo and Juliet',
            imageUrl: './Bookimg/Romance/Romeo and Juliet.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'Sense and Sensibility',
            imageUrl: './Bookimg/Romance/Sense and sensibility.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'The Phantom of The Opera',
            imageUrl: './Bookimg/Romance/The phantom of the opera.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'The Upas Tree',
            imageUrl: './Bookimg/Romance/The Upas Tree.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'The Demon Girl',
            imageUrl: './Bookimg/Romance/The-Demon-Girl.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'Childern of Dune',
            imageUrl: './Bookimg/Sci/Children of Dune.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'Dune Messiah',
            imageUrl: './Bookimg/Sci/Dune Messiah.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'Dune',
            imageUrl: './Bookimg/Sci/Dune.jpg',
            isFree: true
        },
        {
            name: 'Paul of Dune',
            imageUrl: './Bookimg/Sci/Paul of Dune.jpg',
            isFree: true
        },
        {
            name: 'God Emperor of Dune',
            imageUrl: './Bookimg/Sci/God Emperor of Dune.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'Heretics of Dune',
            imageUrl: './Bookimg/Sci/Heretics of Dune.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'House Atreids',
            imageUrl: './Bookimg/Sci/House Atreides.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'House Corrion',
            imageUrl: './Bookimg/Sci/House Corrino.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'House Harkonnen',
            imageUrl: './Bookimg/Sci/House Harkonnen.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'The Butlerian of Jihad',
            imageUrl: './Bookimg/Sci/The Butlerian Jihad.jpg',
            price: '₹325',
            isFree: false
        },
        {
            name: 'Playing it My Way',
            imageUrl: './Bookimg/Autob/Playing It My Way.jpg',
            price: '₹325',
            isFree: false
        },

    ];

    searchBar.addEventListener('input', function () {
        const searchTerm = searchBar.value.trim().toLowerCase();

        if (searchTerm.length >= 3) {
            const filteredBooks = Books.filter(book =>
                book.name.toLowerCase().includes(searchTerm)
            );

            displayResults(filteredBooks);
        } else {
            resultsContainer.style.display = 'none';
        }
    });

    function displayResults(books) {
        resultsContainer.innerHTML = '';

        if (books.length > 0) {
            resultsContainer.style.display = 'flex';

            books.forEach(book => {
                const resultItem = document.createElement('div');
                resultItem.classList.add('result-item');

                const bookContainer = document.createElement('div');
                bookContainer.classList.add('book-container');

                const bookImage = document.createElement('img');
                bookImage.src = book.imageUrl;
                bookImage.alt = book.name;

                const bookDetails = document.createElement('div');
                bookDetails.classList.add('book-details');

                const bookTitle = document.createElement('p');
                bookTitle.textContent = book.name;

                const actionButton = document.createElement('button');
                actionButton.classList.add('bt');

                if (book.isFree) {
                    actionButton.textContent = 'Read Now';
                    actionButton.addEventListener('click', function () {
                        window.location.href = "Hp_4.php"
                        console.log('Read Now clicked for:', book.name);
                    });
                } else {
                    actionButton.textContent = `Buy Now - ${book.price}`;
                    actionButton.addEventListener('click', function () {
                        window.location.href = "Payment.php"
                        console.log('Buy Now clicked for:', book.name);
                    });
                }
                bookDetails.appendChild(bookTitle);
                bookDetails.appendChild(actionButton);

                bookContainer.appendChild(bookImage);
                bookContainer.appendChild(bookDetails);

                resultItem.appendChild(bookContainer);

                resultItem.addEventListener('click', function () {
                    searchBar.value = book.name;
                    resultsContainer.style.display = 'none';
                });

                resultsContainer.appendChild(resultItem);
            });
        } else {
            resultsContainer.style.display = 'block';

            const notFoundMessage = document.createElement('div');
            notFoundMessage.classList.add('not-found-message');
            notFoundMessage.textContent = 'No Book Found';

            resultsContainer.appendChild(notFoundMessage);
        }
    }
});
