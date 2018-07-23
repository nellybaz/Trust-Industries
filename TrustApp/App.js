import React from 'react';
import { StatusBar, StyleSheet, Text, View } from 'react-native';
import Tab from './config/router';

export default class App extends React.Component {

  componentDidMount(){
   StatusBar.setHidden(true);
    //StatusBar.animated(true);
  }
  


  render() {
    return (
              
      <Tab style={styles.tab} />
      
    );
  }
}

const styles = StyleSheet.create({
  tab: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
});
