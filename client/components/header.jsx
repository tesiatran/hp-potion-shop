import React from 'react';

function Header(props) {
  return (
    <header>
      <img className="logo" src="images\ws.jpg"/>
      <h1>{props.text}</h1>
    </header>
  );
}

export default Header;
