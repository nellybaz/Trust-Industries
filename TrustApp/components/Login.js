import React from 'react';
import { StyleSheet, KeyboardAvoidingView, TouchableHighlight, AsyncStorage, TextInput, Image, Text, View } from 'react-native';
import spinner from '../images/spinner.gif';


export default class Login extends React.Component {

    constructor(props){
        super(props);
        this.state = {
            phone: 'Phone',
            password: 'Password',
            isLoginClicked: false,
        }
    }

    login = () =>{
        this.setState({
            isLoginClicked: true,
        });

        var data = {
            "phone": this.state.phone,
            "password": this.state.password,
            "token": 'xxx12345trustapp67890zzz'
         }

        fetch('http://trustindustries.rw/app/login.php',{
            method: 'POST',
            mode: "same-origin",
            credentials: "same-origin",
            headers: {
              Accept: 'application/json',
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),

        })
        .then((response) => response.json())
        .then((responseJson) => {

          //alert(responseJson);
          if(responseJson.res == '1'){
            this.setState({
                isLoginClicked: false,
            });
            AsyncStorage.setItem('user', '2');
            this.props.navigation.navigate('Home');
          }
          else if(responseJson.res == '0'){
            this.setState({
                isLoginClicked: false,
            });
              alert('WRONG LOGIN DETAILS');
          }
          else{
            this.setState({
                isLoginClicked: false,
            });
            alert('Error');
          }
        })
        .catch((error) => {
            alert(error);
          console.error(error);
        });
        
    }

    componentDidMOunt(){

    }
  render() {
    return (
      <KeyboardAvoidingView style={styles.container}>

        <View style={styles.innerView} id = "login-inner">
            <TextInput
                style={styles.textInput}                
                placeholder="PHONE"
                onChangeText = {(phone)=> {this.setState({phone})}}
            />

            <TextInput
                style={styles.textInput}
                placeholder="PASSWORD"
                secureTextEntry={true}
                onChangeText = {(password)=> {this.setState({password})}}
            />
            { this.state.isLoginClicked &&
            <Image
                source={spinner}
                style={{height:50, width:50}}
            />
            }
            <TouchableHighlight
                underlayColor="#CE93D8"
                style={styles.touchableHighlight}
                onPress={()=> this.login()}
            >
                <Text style={{fontSize:20, fontWeight:'bold'}}>Login</Text>
            </TouchableHighlight>
        </View>
      </KeyboardAvoidingView>
    );
  }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',   
    alignItems:'center',
    justifyContent:'center',
    backgroundColor: '#4A148C',
  
  },

  touchableHighlight:{
    alignItems: 'center',
    //color:'#fff',
    padding:15,
    backgroundColor: "#fff",
    margin:30,
    alignSelf:'stretch',
    
  },
  innerView:{
      //height:200,
      alignSelf:'stretch',
      alignItems: 'center',
     // backgroundColor: 'blue'
  },

  textInput:{
      alignSelf:'stretch',
      padding:10,
      height:40,
      marginBottom:15,
      marginRight:30,
      marginLeft:30,
      fontSize:16,
      color:'#fff',
  }

});
