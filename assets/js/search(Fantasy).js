document.addEventListener('DOMContentLoaded', function () {
    const searchBar = document.getElementById('searchBar');
    const resultsContainer = document.getElementById('results');

    // Move the Books array outside the event listener
    const Books = [
        {
            name: 'Harry Potter and The Deathly Hallows',
            imageUrl: './Bookimg/Fantasy/Harry Potter And The Deathly Hallows.png',
            isFree: true

        },
        {
            name: 'Harry Potter and The Half Blood Prince',
            imageUrl: './Bookimg/Fantasy/Harry Potter And The Half-Blood Prince.png',
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
            name: 'Harry Potter and The Prisoner of Azkaban',
            imageUrl: './Bookimg/Fantasy/Harry Potter And The Prisoner of Azkaban.png',
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
                        // Implement the action when the "Read Now" button is clicked
                        console.log('Read Now clicked for:', book.name);
                        window.location.href = "Hp_p7.php"
                    });
                } else {
                    actionButton.textContent = `Buy Now - ${book.price}`;
                    actionButton.addEventListener('click', function () {
                        // Implement the action when the "Buy Now" button is clicked
                        console.log('Buy Now clicked for:', book.name);
                    });
                }

                const wishlistButton = document.createElement('button');
                wishlistButton.innerHTML = ``;
                wishlistButton.addEventListener('click', function () {
                    // Implement the action when the "Wishlist" button is clicked
                    console.log('Wishlist clicked for:', book.name);
                });

                bookDetails.appendChild(bookTitle);
                bookDetails.appendChild(actionButton);
                bookDetails.appendChild(wishlistButton);

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
