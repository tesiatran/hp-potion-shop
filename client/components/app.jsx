import React from 'react';
import Header from './header';
import ProductList from './product-list';

export default class App extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      view: {
        name: 'catalog',
        params: {}
      }
    };
  }

  setView(name, params) {
    this.setState({
      view: {
        name: 'name String',
        params: 'params Object'
      }
    });
  }

  render() {
    return (
      <div className="container">
        <Header text="Wicked Sales"/>
        <ProductList/>
      </div>
    );
  }
}
