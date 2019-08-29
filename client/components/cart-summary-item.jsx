import React from 'react';

function CartSummaryItem(props) {
  return (
    <div className="container">
      <div className="row">
        <img src={props.cartItemData.image} className="col my-3"></img>
        <div className="col">
          <div className="row">
            <div className="col justify-content-start productName my-3">{props.cartItemData.name}</div>
          </div>
          <div className="row">
            <div className="col justify-content-start my-3">${(props.cartItemData.price * 0.01).toFixed(2)}</div>
          </div>
          <div className="row">
            <div className="col justify-content-start my-3">{props.cartItemData.shortDescription}</div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default CartSummaryItem;
