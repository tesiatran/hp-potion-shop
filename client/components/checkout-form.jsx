import React from 'react';

class CheckoutForm extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      name: '',
      creditCard: '',
      shippingAddress: ''
    };
    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleNameChange = this.handleNameChange.bind(this);
    this.handleCreditCardChange = this.handleCreditCardChange.bind(this);
    this.handleShippingAddressChange = this.handleShippingAddressChange.bind(this);
  }

  handleNameChange(event) {
    this.setState({
      name: event.target.value
    });
  }

  handleCreditCardChange(event) {
    this.setState({
      creditCard: event.target.value
    });
  }

  handleShippingAddressChange(event) {
    this.setState({
      shippingAddress: event.target.value
    });
  }

  handleSubmit() {
    event.preventDefault();
    var orderObject = {
      name: this.state.name,
      creditCard: this.state.creditCard,
      shippingAddress: this.state.shippingAddress,
      cart: this.props.cartTotalData
    };
    this.props.placeOrder(orderObject);
  }

  render() {
    var totalPrice = this.props.cartTotalData
      .map(item => item.price)
      .reduce((a, b) => a + b, 0);

    return (
      <form className="container mx-auto" onSubmit={this.handleSubmit}>
        <div className="text">
          <h1 className="my-3 col-6 mx-auto text-left"><u>CHECKOUT</u></h1>
          <h3 className="my-3 col-6 mx-auto text-left">Order Total: ${(totalPrice * 0.01).toFixed(2)}</h3>
          <div className="my-3 col-6 mx-auto text-left">
            <div>Name</div>
            <input
              type="text"
              onChange={this.handleNameChange}></input>
            <div>Credit Card</div>
            <input
              type="text"
              onChange={this.handleCreditCardChange}></input>
            <div>Shipping Address</div>
            <textarea
              type="text"
              onChange={this.handleShippingAddressChange}></textarea>
          </div>
          <div className="my-3 col-6 mx-auto text-left">
            <div className="d-inline"
              onClick={() => {
                this.props.setView('catalog', {});
              }}>{this.props.continueText}</div>
            <button className="float-right" type="submit">Place Order</button>
          </div>
        </div>
      </form>
    );
  }
}

export default CheckoutForm;
