import React from 'react';
import CartSummaryItem from './cart-summary-item';

function CartSummary(props) {
  var totalPrice = props.cartTotalData
    .map(item => item.price)
    .reduce((a, b) => a + b, 0);

  if (props.cartTotalData.length > 0) {
    return (
      <div className="container text">
        <div onClick={() => {
          props.setView('catalog', {});
        }}>{props.backText}</div>
        <h1 className="my-3 col-6 mx-auto text-left"><u>MY CART</u></h1>
        <div className="row my-3">
          {props.cartTotalData.map(item => {
            return (
              <CartSummaryItem key={item.id} cartItemData={item}/>
            );
          })}
        </div>
        <div className="row my-5 col-6 mx-auto text-left">
          <h3 className="col">Subtotal: ${(totalPrice * 0.01).toFixed(2)}</h3>
          <button className="col-4" onClick={() => { props.setView('checkout', {}); }}>Checkout</button>
        </div>
      </div>
    );
  } else {
    return (
      <div className="container text">
        <div onClick={() => {
          props.setView('catalog', {});
        }}>{props.backText}</div>
        <h1 className="my-3 col-8 mx-auto text-center">Your cart is empty!</h1>
        <h1 className="my-6 col-8 mx-auto text-center"><i className="fas fa-frown"></i></h1>
      </div>
    );
  }
}

export default CartSummary;
