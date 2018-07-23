import React from 'react';
import { StyleSheet, Text, View } from 'react-native';
import Icon from 'react-native-elements';
import {createMaterialTopTabNavigator, createSwitchNavigator, createStackNavigator} from 'react-navigation';
import Index from '../components/Index';
import Upload from '../components/Upload';
import Dashboard from '../components/Dashboard';
import Settings from '../components/Settings';
import Login from '../components/Login';


const UploadStack = createStackNavigator({
  Home:{
    screen: Index,      
  },

  Upload:{
    screen: Upload,
      
  }
},


);


const IndexMainNavigator = createMaterialTopTabNavigator({ 
  Home : { screen: UploadStack,}, 
  Dashboard : { screen: Dashboard }, 
  Settings : { screen: Settings }, }, 
  
  { tabBarOptions: { style: { backgroundColor: '#4A148C', height:80, marginTop:0 }, } });



  const LoginStack = createStackNavigator({
    Login:{screen: Login,
    navigationOptions:{
      header:null,
    }
    }
  });


const LoginHomeStack = createSwitchNavigator({
   Home:{
    screen: IndexMainNavigator,
    navigationOptions:{
      header: null,
    }
  }, 

  Login:{
    screen: LoginStack,
    navigationOptions:{
      header: null,
    }
  },
});





  

export default LoginHomeStack;

