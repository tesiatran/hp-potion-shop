import React from 'react';

class CheckoutForm extends React.Component {
  constructor(props) {
    super(props);
    this.state = {};
  }

  render() {
    var totalPrice = this.props.cartTotalData
      .map(item => item.price)
      .reduce((a, b) => a + b, 0);

    return (
      <form>
        <div className="text">
          <h1 className="my-3 col-6 mx-auto text-left">Checkout</h1>
          <h1 className="col">Total: ${(totalPrice * 0.01).toFixed(2)}</h1>
          <div>Name</div>
          <input></input>
          <div>Credit Card</div>
          <input></input>
          <div>Shipping Address</div>
          <textarea></textarea>
        </div>
      </form>
    );
  }
}

export default CheckoutForm;
