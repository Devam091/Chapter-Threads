document.addEventListener('DOMContentLoaded', function () {
    const searchBar = document.getElementById('searchBar');
    const resultsContainer = document.getElementById('results');

    // Move the Books array outside the event listener
    const Books = [
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
