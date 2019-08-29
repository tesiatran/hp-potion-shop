import React from 'react';
import CartSummaryItem from './cart-summary-item';

function CartSummary(props) {
  return (
    <div className="container">
      <div onClick={() => {
        props.setView('catalog', {});
      }}>{props.backText}</div>
      <div>My Cart</div>
      <CartSummaryItem cartItemData={props.cartTotalData}/>
      <div>Total</div>
    </div>
  );
}

export default CartSummary;
