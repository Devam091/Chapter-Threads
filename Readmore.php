<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chapter Threads - Theads of Knowledge</title>
        <meta name="title" content="Chapter Threads - Theads of Knowledge">
        <meta name="description"
          content="Read More And Make Success The Result Of Perfection. - Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad harum quibusdam, assumenda quia explicabo.">
        <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
        <link rel="stylesheet" href="read.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link rel="stylesheet" href="style.css">
        <link
          href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Poppins:wght@400;500;600&display=swap"
          rel="stylesheet">
        <link rel="preload" as="image" href="./assets/images/hero-banner.png">
        <meta name="google-site-verification" content="R1vO93Nlp7vQUiw7g84UEJnKTURYOnTQ-d1ZwViF3GI" />
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

::-webkit-scrollbar{
  width: 10px;
}
::-webkit-scrollbar-track{
  background-color: #FFFFFF;
  opacity: 20%;
}
::-webkit-scrollbar-thumb{
  background-color: #D18C7E;
  opacity: 100%;
}
::-webkit-scrollbar-thumb:hover{
  background-color: hsl(304, 14%, 46%);
}
      </style>
      </head>
<body style="background-color: var(--seashell);">
    <header class="header" data-header>
        <div class="container">
    
          <a href="#" class="logo">Chapter Threads</a>
    
          <nav class="navbar" data-navbar>
            <ul class="navbar-list">
    
              <li class="navbar-item">
                <a href="index.php" class="navbar-link" data-nav-link>Home</a>
              </li>
              <?php
          if(isset($_SESSION['Email'])){
         echo' <li class="navbar-item">
        <a href="discover.php" class="navbar-link" data-nav-link target="_parent">Discover</a>
        </li>';
        }
        else{
          echo' <li class="navbar-item">
          <a href="login.php" class="navbar-link" data-nav-link target="_parent">Discover</a>
          </li>';
        }
        ?>
              <?php
if(isset($_SESSION['Email']))
{
  echo '<li class="navbar-item">
  <a href="Logout.php" class="navbar-link" data-nav-link>Log Out</a>
</li>';
}
else{
  echo'<button class="navbar-link dropdown">
  Sign Up
  <i class="fa fa-caret-down"></i>
  <div class="dropdown-content">
    <a href="Login.php">Log-In</a>
    <a href="Sign-In.php">Sign up</a>
  </div>
</button>';
}
?>
              <li class="navbar-item">
                <a href="#contact" class="navbar-link" data-nav-link>Contact</a>
              </li>
    
            </ul>
          </nav>
    
          <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
            <ion-icon name="menu-outline" aria-hidden="true" class="open"></ion-icon>
    
            <ion-icon name="close-outline" aria-hidden="true" class="close"></ion-icon>
          </button>
    
        </div>
      </header>
      <br>
      <section class="section benefits" id="benefits" aria-label="benefits">
        <div class="container">

            <li class="benefits-content">
                <div class="benefits-card has-before has-after"style="background-color: var(--white);width: 1100px;">

                    <div class="card-icon" id="Experience">
                      <img src="./assets/images/benefits-1.svg" width="40" height="40" loading="lazy" alt="Experience" title="Experience">
                    </div>
    
                    <h3 class="h3 card-title">Experience</h3>
    
                    <p class="card-text">
                        <b>1.Immersive Engagement: </b>Whenyou start reading a captivating book paragraph, you may find yourself immediately drawn into the world created by the author. The words on the page transport you to a different time, place, or perspective, allowing you to temporarily escape from your own reality.<br><br>
                        <b>2.Emotional Connection:</b> A powerful book paragraph can evoke a wide range of emotions. Whether it's a beautifully described scene that fills you with awe or a poignant moment that brings tears to your eyes, books have the ability to make readers feel deeply connected to the characters and their experiences.<br><br>
                        <b>3.Visualization:</b> As you read, your mind's eye begins to construct images and scenes based on the author's descriptions. It's like having a private movie playing in your head, where you can see the characters, settings, and events vividly.
                    </p>
    
                  </div>
            </li>

            <br>

            <li class="benefits-content">
                <div class="benefits-card has-before has-after"style="background-color: var(--white);width: 1100px;">
    
                  <div class="card-icon" id="Motivation">
                    <img src="./assets/images/benefits-2.svg" width="40" height="40" loading="lazy" alt="Motivation" title="Motivation">
                  </div>
    
                  <h3 class="h3 card-title">Motivation</h3>
    
                  <p class="card-text">
                    <b>1. Ignition of Inner Fire:</b>  Reading a motivational book paragraph can spark a profound sense of motivation within you. It's like striking a match in the darkness of doubt or complacency. These paragraphs often contain stories of individuals who have triumphed against the odds, overcome adversity, or achieved remarkable success. As you immerse yourself in their narratives, you can't help but feel the flicker of inspiration. You begin to believe that if they can do it, so can you. It's as if the words on the page breathe life into your dormant ambitions and desires, compelling you to take action. <br><br>
                    <b>2.Empowerment and Confidence: </b>Motivational paragraphs in books have the power to instill a sense of empowerment and confidence. They remind you that you have the agency to shape your destiny. They encourage you to trust in your abilities and take charge of your life. As you read about others who have faced daunting challenges and emerged victorious, you realize that resilience, determination, and self-belief can be your guiding principles. This newfound confidence can permeate other aspects of your life, leading to a positive ripple effect. <br><br>
                    <b>3.Goal Setting and Clarity: </b> Motivation often goes hand in hand with goal setting and clarity. Reading a motivating book paragraph can prompt you to reflect on your own aspirations and ambitions. It can help you clarify your objectives and the steps needed to achieve them. You might find yourself jotting down goals, creating action plans, and envisioning your path to success with newfound clarity and purpose.
                  </p>
                </div>
              </li>

              <br>

              <li class="benefits-content">
                <div class="benefits-card has-before has-after"style="background-color: var(--white);width: 1100px;">
  
                  <div class="card-icon" id="Goals">
                    <img src="./assets/images/benefits-3.svg" width="40" height="40" loading="lazy" alt="Goals">
                  </div>
  
                  <h3 class="h3 card-title">Goals</h3>
  
                  <p class="card-text">
                    <b>1.Clarity of Purpose: </b>Goal-Settingparagraphs often emphasize the importance of defining clear objectives. Reading such paragraphs can help you gain a deeper understanding of what you want to achieve and why it matters to you. This clarity of purpose is essential for effective goal setting.<br><br>
                    <b>2.Motivation and Inspiration: </b>Goal-Setting paragraphs typically contain stories of individuals who set and achieved remarkable goals. These narratives can serve as powerful sources of motivation and inspiration. They show you that with dedication and effort, even seemingly insurmountable goals can be reached.<br><br>
                    <b>3.Action Planning: </b> goal-setting paragraphs provide practical tips and strategies for turning goals into actionable plans. They may emphasize the importance of breaking down big goals into smaller, manageable steps. By reading and internalizing these strategies, you can learn how to create a roadmap toward your own objectives.
                  </p>
                </div>
              </li>

              <br>

              <li class="benefits-content">
                <div class="benefits-card has-before has-after"style="background-color: var(--white);width: 1100px;">
  
                  <div class="card-icon" id="Vision">
                    <img src="./assets/images/benefits-4.svg" width="40" height="40" loading="lazy" alt="Vision">
                  </div>
  
                  <h3 class="h3 card-title">Vision</h3>
  
                  <p class="card-text">
                    <b>1. Personal Growth: </b>Reading books can broaden your perspective and expose you to new ideas and experiences. This can help you envision personal growth and self-improvement as you learn from the experiences and insights of others.<br><br>
                    <b>2. Career and Professional Development: </b>Books on career-related topics can provide valuable guidance and knowledge to help you envision your professional path. Whether it's acquiring new skills, advancing in your career, or even starting your own business, reading can provide the vision and knowledge necessary for success.<br><br>
                    <b>3. Creativity and Imagination: </b>Fiction and creative literature can stimulate your imagination and expand your creative horizons. Reading can help you envision new worlds, ideas, and possibilities, fueling your own creativity and imaginative thinking.
                  </p>
                </div>
              </li>

              <br>

              <li class="benefits-content">
                <div class="benefits-card has-before has-after"style="background-color: var(--white);width: 1100px;">
  
                  <div class="card-icon" id="Mission">
                    <img src="./assets/images/benefits-5.svg" width="40" height="40" loading="lazy" alt="Mission">
                  </div>
  
                  <h3 class="h3 card-title">Mission</h3>
  
                  <p class="card-text">
                    <b>1.Social and Environmental Mission:</b> Reading books on social issues, sustainability, and activism can motivate individuals to define a mission focused on making a positive impact on society and the environment. Such books can ignite a sense of responsibility and a desire to contribute to meaningful causes. <br><br>
                    <b>2.Educational Mission:</b> Books in various fields of study can help individuals set educational missions, whether it's acquiring new skills, pursuing higher education, or becoming experts in a particular subject. Reading provides the knowledge and inspiration needed to embark on educational journeys.<br><br>
                    <b>3.Artistic and Creative Mission:</b> Literature, art, and creative writing books can fuel artistic and creative missions. They encourage individuals to express themselves, explore their creativity, and share their unique perspectives with the world.
                  </p>
                </div>
              </li>

              <br>

              <li class="benefits-content">
                <div class="benefits-card has-before has-after"style="background-color: var(--white);width: 1100px;">
  
                  <div class="card-icon" id="Strategy">
                    <img src="./assets/images/benefits-6.svg" width="40" height="40" loading="lazy" alt="Strategy">
                  </div>
  
                  <h3 class="h3 card-title">Strategy</h3>
  
                  <p class="card-text">
                    <b>1.Business and Management Strategy: </b>Books on business management, strategy, and entrepreneurship provide valuable frameworks and case studies that can help individuals and organizations formulate effective strategies for growth, innovation, and competitive advantage. They offer insights into market trends, leadership, and decision-making. <br><br>
                    <b>2.Personal Development Strategy: </b>Self-help and personal development books offer strategies for improving various aspects of life, including time management, goal setting, communication skills, and emotional intelligence. They provide practical advice and techniques for personal growth and success.<br><br>
                    <b>3.Investment and Financial Strategy: </b>Books on finance and investment provide strategies for managing money, building wealth, and achieving financial goals. They cover topics such as budgeting, saving, investing, and retirement planning, helping readers make informed financial decisions.
                  </p>
                </div>
              </li>
        </div>
        <br>
      </section>




      <section class="section contact" id="contact" aria-label="contact">
        <div class="container">

          <p class="section-subtitle">Contact</p>

          <h2 class="h2 section-title has-underline">
            Write me anything
            <span class="span has-before"></span>
          </h2>

          <div class="wrapper">

            <form action="" class="contact-form">

              <input type="text" name="name" placeholder="Your Name" required class="input-field">

              <input type="email" name="email_address" placeholder="Your Email" required class="input-field">

              <input type="text" name="subject" placeholder="Subject" required class="input-field">

              <textarea name="message" placeholder="Your Message" class="input-field"></textarea>

              <button type="submit" class="btn btn-primary">Send Now</button>


            </form>

            <ul class="contact-card">

              <li>
                <p class="card-title">Address:</p>

                <address class="address">
                  16, Abcxy <br>
                  Abcxyz, India 999000
                </address>
              </li>

              <li>
                <p class="card-title">Phone:</p>

                <a href="tel:1234567890" class="card-link">123 456 7890</a>
              </li>

              <li>
                <p class="card-title">Email:</p>

                <a href="mailto:chapterthreads@gmail.com" class="card-link">chapterthreads@gmail.com</a>
              </li>

              <li>
                <p class="social-list-title h3">Connect book socials</p>

                <ul class="social-list">

                  <li>
                    <a href="#" class="social-link">
                      <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="social-link" style="padding-bottom: 0px; padding-top: 0px; height: 41px;">
                    <!-- <ion-icon name="logo-twitter"></ion-icon> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
  <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
</svg>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="social-link">
                      <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="social-link">
                      <ion-icon name="logo-youtube"></ion-icon>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="social-link">
                      <ion-icon name="logo-whatsapp"></ion-icon>
                    </a>
                  </li>

                </ul>
              </li>

            </ul>

          </div>

        </div>
      </section>
      <script src="./assets/js/script.js" defer></script>
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>