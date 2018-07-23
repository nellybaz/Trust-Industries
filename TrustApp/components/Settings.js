import React from 'react';
import { StyleSheet,TouchableHighlight, AsyncStorage, Image, Text, View } from 'react-native';
import face from '../images/icon_person.png';
import {NavigationActions, StackActions} from 'react-navigation';
import add_icon from '../images/add_icon.png';
import phone_icon from '../images/phone_icon.png';
import changePassword_icon from '../images/changePassword_icon.png';


export default class Settings extends React.Component {


  logout = ()=>{
    AsyncStorage.removeItem('user', ()=>{      
      this.props.navigation.navigate("Login")
    })
   
  }


  render() {
    return (
      <View style={styles.container}>
        <View id="user_info" style={styles.infoView}>
          <Image
            source={face}
            style={styles.user_image}

          />

          <View id="user_info_inner" style={styles.userInfoInner}>
            <Text style={{fontSize:20,}}>LoggedIn Name</Text>
            <Text style={{fontSize:16, color: 'gray'}}>Team Leader for Musanze</Text>

          </View>

          

         
        </View>

        <View id="hr-line"
          style={{
            borderBottomColor: 'black',
            borderBottomWidth: 0.3,
          }}
        />

        <TouchableHighlight
            onPress = {()=> this.addFootSoldier()}
            underlayColor="#CE93D8"
            style = {styles.touchableHighlight}
        >
            <View id="add_soldier_view" style={{flexDirection:'row'}}>
              <Image
                source={add_icon}
                style={{width:30, height:30, marginRight:10,}}
              />
              <Text style={{fontSize:20}}>Add Foot-Soldier</Text>
            </View>
           
        </TouchableHighlight>


         <TouchableHighlight id="change-phone"
            onPress = {()=> this.changePassword()}
            underlayColor="#CE93D8"
            style = {styles.touchableHighlight}
        >
            <View id="add_soldier_view" style={{flexDirection:'row'}}>
              <Image
                source={phone_icon}
                style={{width:30, height:30, marginRight:10,}}
              />
              <Text style={{fontSize:20}}>Change Phone Number</Text>
            </View>
           
        </TouchableHighlight>

        <TouchableHighlight id="change-password"
            onPress = {()=> this.changePassword()}
            underlayColor="#CE93D8"
            style = {styles.touchableHighlight}
        >
            <View id="add_soldier_view" style={{flexDirection:'row'}}>
              <Image
                source={changePassword_icon}
                style={{width:30, height:30, marginRight:10,}}
              />
              <Text style={{fontSize:20}}>Change Password</Text>
            </View>
           
        </TouchableHighlight>

         <TouchableHighlight id="logout"
            onPress = {()=> this.logout()}
            underlayColor="#CE93D8"
            style = {styles.touchableHighlight}
        >
            <View id="add_soldier_view" style={{flexDirection:'row'}}>
              <Image
                source={changePassword_icon}
                style={{width:30, height:30, marginRight:10,}}
              />
              <Text style={{fontSize:20}}>Logout</Text>
            </View>
           
        </TouchableHighlight>
       
      </View>
    );
  }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
  
  },

  infoView:{
    flexDirection:'row',
    padding:15,
    marginTop:10,
    marginBottom:10,

  },

  user_image:{
    width:80,
    height:80,
    borderRadius:40,
  },
  
  userInfoInner:{
    marginTop: 15,
    marginLeft: 10,
  },

  touchableHighlight:{
   // backgroundColor: '#F3E5F5',
    padding: 10,
    borderBottomWidth:0.5,
    marginTop:15,
    marginLeft:15,
    marginRight:15,
  }
});
