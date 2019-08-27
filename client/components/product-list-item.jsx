import React from 'react';

function ProductListItem(props) {
  return (
    <div className="row justify-content-center">
      {props.productData.map(product => {
        return (
          <div
            key={product.id}
            onClick={() => {
              props.setView('details', { 'id': product.id });
            }}
            className="card col-3 mx-2 my-2">
            <img src={product.image} className="img-fluid my-2"></img>
            <div className="font-weight-bold my-1">{product.name}</div>
            <div className="my-1">${(product.price * 0.01).toFixed(2)}</div>
            <div className="my-1">{product.shortDescription}</div>
          </div>
        );
      })}
    </div>
  );
}

export default ProductListItem;
