import React from 'react';

function ProductListItem(props) {
  return (
    <div
      onClick={() => {
        props.setView('details', { 'id': props.productData.id });
      }}
      className="card col-3 mx-2 my-2 text">
      <img src={props.productData.image} className="card-img-top my-2"></img>
      <div className="card-body">
        <div className="card-title font-weight-bold my-1">{props.productData.name}</div>
        <div className="card-text my-1">${(props.productData.price * 0.01).toFixed(2)}</div>
        <div className="card-text my-1">{props.productData.shortDescription}</div>
      </div>
    </div>
  );
}

export default ProductListItem;
