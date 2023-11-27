* {
    margin: 0;
    padding: 0;
  }
  
  body {
    height: 100vh;
    color: white;
    display: grid;
    place-items: center;
    background: radial-gradient(circle, rgba(26,39,85,1) 0%, rgba(0,13,57,1) 62%);
    font-family: 'New Walt Disney Font', sans-serif;
  }
  
  div {
    display: flex;
    font-size: 8rem;
  }
  
  #stellina {
    margin-left: 30px;
    font-family: sans-serif;
    position: relative;
    transform-origin: -250px 50%;
    animation: spinDot 3s ;
  }
  
  #stellina::after {
    content: '+';
    position: absolute;
    top: 0;
    left: -38%;
    animation: spinPlus 3s ;
  }
  
  @keyframes spinDot {
    0% {
      opacity: 0;
      transform: rotate(220deg) scale(0);
      text-shadow: none;
    }
    80% {
      opacity: 1;
      transform: rotate(360deg) scale(1);
    }
    90% {
      opacity: 0;
    }
    100% {
      opacity: 0;
      transform: rotate(360deg) scale(1);
      text-shadow: 0 0 5px #fff,0 0 10px #fff,0 0 15px #fff,0 0 20px #228dff,0 0 35px #228dff,0 0 40px #228dff;
    }
  }
  
  @keyframes spinPlus {
    0% {
      transform: rotate(220deg);
    }
    20% {
      transform: scale(0);
    }
    80% {
      transform: scale(1);
    }
    90% {
      opacity: 1;
    }
    100% {
      opacity: 0;
      transform: rotate(360deg) scale(1);
      text-shadow: 0 0 5px #fff,0 0 10px #fff,0 0 15px #fff,0 0 20px #228dff,0 0 35px #228dff,0 0 40px #228dff;
      <?php 
      header("Content-type: text/css"); 
      ?>
      
    }
  }