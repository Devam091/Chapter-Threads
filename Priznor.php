<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link
    href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Poppins:wght@400;500;600&display=swap"
    rel="stylesheet">
    <style>
        :root {

            /**
             * colors
             */
          
            --chinese-violet_30: hsla(304, 14%, 46%, 0.3);
            --chinese-violet: hsl(304, 14%, 46%);
            --sonic-silver: hsl(208, 7%, 46%);
            --old-rose_30: hsla(357, 37%, 62%, 0.3);
            --ghost-white: hsl(233, 33%, 95%);
            --light-pink: hsl(357, 93%, 84%);
            --light-gray: hsl(0, 0%, 80%);
            --old-rose: hsl(357, 37%, 62%);
            --seashell: hsl(20, 43%, 93%);
            --charcoal: hsl(203, 30%, 26%);
            --white: hsl(0, 0%, 100%);
          
            /**
             * typography
             */
          
            --ff-philosopher: 'Philosopher', sans-serif;
            --ff-poppins: 'Poppins', sans-serif;
          
            --fs-1: 4rem;
            --fs-2: 3.2rem;
            --fs-3: 2.7rem;
            --fs-4: 2.4rem;
            --fs-5: 2.2rem;
            --fs-6: 2rem;
            --fs-7: 1.8rem;
          
            --fw-500: 500;
            --fw-700: 700;
          
            /**
             * spacing
             */
          
            --section-padding: 80px;
          
            /**
             * shadow
             */
          
            --shadow-1: 4px 6px 10px hsla(231, 94%, 7%, 0.06);
            --shadow-2: 2px 0 15px 5px hsla(231, 94%, 7%, 0.06);
            --shadow-3: 3px 3px var(--chinese-violet);
            --shadow-4: 5px 5px var(--chinese-violet);
          
            /**
             * radius
             */
          
            --radius-5: 5px;
            --radius-10: 10px;
          
            /**
             * clip path
             */
          
            --polygon: polygon(100% 29%,100% 100%,19% 99%,0 56%);
          
            /**
             * transition
             */
          
            --transition-1: 0.25s ease;
            --transition-2: 0.5s ease;
            --cubic-out: cubic-bezier(0.33, 0.85, 0.4, 0.96);
          
          }
          body{
            background-color: var(--seashell);
            font-family: var(--ff-philosopher);
          }
          a{
            text-decoration: none;
            color: #fff;
            font-family: var(--ff-philosopher);
          }
          .bt{
            background-color: #C27A7E;
            border: 1px solid #C27A7E;
            padding: 10px;
            padding-left: 20px;
            padding-right: 20px;
          }
          .bt:hover{
            background-color: var(--chinese-violet);
            transition: .3s;
          }
    </style>
</head>

<body>
    <iframe src="https://publuu.com/flip-book/346541/815684/page/1?embed" width="100%" height="380" scrolling="no" frameborder="0" allowfullscreen="" allow="clipboard-write" class="publuuflip"></iframe><br><br>
        <center>
        <button class="bt" name="button"><a href="Hp_5.php">Give Quiz</a></button>
    </center>
</body>
</html>