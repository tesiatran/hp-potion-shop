import React from 'react';

function Header(props) {
  return (
    <header className="row align-items-center justify-content-center">
      <img className="logo rounded-circle" src="images\ws.jpg"/>
      <h1 className="storeName">{props.text}</h1>
    </header>
  );
}

export default Header;
