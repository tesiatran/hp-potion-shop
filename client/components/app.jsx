import React from 'react';
import Header from './header';
import ProductList from './product-list';
import ProductDetails from './product-details';

export default class App extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      view: {
        name: 'catalog',
        params: {}
      },
      cart: []
    };
    this.setView = this.setView.bind(this);
  }

  componentDidMount() {
    this.getCartItems();
  }

  getCartItems() {
    fetch('/api/cart.php')
      .then(response => {
        return response.json();
      })
      .then(data => {
        this.setState({
          products: data
        });
      });
  }

  setView(name, params) {
    this.setState({
      view: {
        name: name,
        params: params
      }
    });
  }

  render() {
    if (this.state.view.name === 'catalog') {
      return (
        <div className="container">
          <Header text="Wicked Sales" cartItemCount={this.state.cart.length}/>
          <ProductList setView={this.setView}/>
        </div>
      );
    } else {
      return (
        <div className="container">
          <Header text="Wicked Sales"/>
          <ProductDetails setView={this.setView} view={this.state.view.params} text="<Back to catalog"/>
        </div>
      );
    }
  }
}
