import React from 'react';

function Header(props) {
  return (
    <header className="row align-items-center justify-content-center">
      <img className="logo rounded-circle" src="images\ws.jpg"/>
      <h1 className="storeName">{props.nameText}</h1>
      <div className="text cart mx-5" onClick={() => { props.setView('cart', {}); }}>{props.cartItemCount} Items <i className="fas fa-shopping-cart" onClick={() => { props.setView('cart', {}); }}></i></div>
    </header>
  );
}

export default Header;
