document.addEventListener('DOMContentLoaded', function () {
    const searchBar = document.getElementById('searchBar');
    const resultsContainer = document.getElementById('results');

    // Move the Books array outside the event listener
    const Books = [
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
            name: 'Playing it My Way',
            imageUrl: './Bookimg/Autob/Playing It My Way.jpg',
            price: '₹325',
            isFree: false
        },
        {   name: 'I am Malala', 
            imageUrl: './Bookimg/Autob/I am Malala.png', 
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
                    });
                } else {
                    actionButton.textContent = `Buy Now - ${book.price}`;
                    actionButton.addEventListener('click', function () {
                        // Implement the action when the "Buy Now" button is clicked
                        console.log('Buy Now clicked for:', book.name);
                    });
                }

                const wishlistButton = document.createElement('button');
                wishlistButton.innerHTML = `
    <button class="add-to-cart">
        <i class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
    </button>
`;
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
