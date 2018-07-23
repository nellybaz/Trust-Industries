import React from 'react';
import prd1 from '../images/p2.png';
import { StyleSheet,TextInput, TouchableHighlight, ScrollView, Image, KeyboardAvoidingView, Text, View } from 'react-native';

export default class Upload extends React.Component {

  static navigationOptions = ({ navigation }) =>{
   
    return{
    title: navigation.getParam('user_name', 'Soldier'),
    headerStyle: {
      backgroundColor: '#4A148C',
      
    },
    headerTintColor: '#fff',
    
  }
  };
  constructor(props){
    super(props);

    this.state = {
      barSoap: '0',
      serviette: '0',
      detergent: '0',
     soldier_id: '0'
      
    }
  }


  submitRecord = (x)=>{
   const motive = x;

   if(this.state.barSoap == '0' || this.state.detergent == '0'){
     alert('Value can not be empty');
   }

   else if(this.state.serviette == '0'){
     alert('Value can not be empty');
   }

   else{
     let server_motive = 'recordToday';

    if(motive == 1){
        server_motive = 'editYesterday';

    }
   
    const { navigation } = this.props;
    var data = {
      "id": navigation.getParam('soldier_id', '1'),    
      "token": 'xxx12345trustapp67890zzz',
      "barSoap": this.state.barSoap,
      "server_motive": server_motive,
      "detergent": this.state.detergent,
      "serviette": this.state.serviette,
   }

   fetch('http://trustindustries.rw/app/foot_soldiers_upload.php',{
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
            alert('Uploaded Successfully');
            this.props.navigation.navigate('Home');
          }
          else if(responseJson.res == '2'){
              alert('failed to upload, please contact Trust Industries');
          }

          else if(responseJson.res == '-2'){
            alert('Wait 24 hrs to upload tomorrows sales');
        }

        else if(responseJson.res == '-4'){
          alert('You can not edit after 10 am');
      }

      else if(responseJson.res == '5'){
        alert('Edited Successfully');
    }
          else{
           
            alert('Error contact Trust Industries');
          }
        })
        .catch((error) => {
            alert(error);
          console.error(error);
        });
        
      }

    

    
  }

  render() {    

    //const {id, name, phone}  = this.props.naviagtion.state.params;
    const { navigation } = this.props;
    const user_name = navigation.getParam('user_name', 'NO-NAME');
    const soldier_id = navigation.getParam('soldier_id', '1');
    
    return (
      <KeyboardAvoidingView style={styles.container}>
        <ScrollView style={styles.scrollView}>
        <View style={styles.prdView} >
                        
                        <Image
                          style={styles.prdImg}
                          source={prd1}
                        />
                          <View id="innerView" style={styles.innerPrdView}>
                              <Text style={styles.prdTitle}>BarSoap</Text>
                              <TextInput
                                keyboardType = 'numeric'
                                placeholder= "Enter Number of Cartons"
                                style={{height: 40, fontSize:20, }}
                                onChangeText ={ (barSoap) => {this.setState({barSoap})}}
                                
                              />
          
                      </View>
                  </View>


                     <View style={styles.prdView} >
                        
                        <Image
                          style={styles.prdImg}
                          source={prd1}
                        />
                          <View id="innerView" style={styles.innerPrdView}>
                              <Text style={styles.prdTitle}>Serviette</Text>
                              <TextInput
                                keyboardType = 'numeric'
                                placeholder= "Enter Number of Cartons"
                                style={{height: 40, fontSize:20, }}
                                onChangeText ={ (serviette) => {this.setState({serviette})}}
                                
                              />
          
                      </View>
                  </View>


                     <View style={styles.prdView} >
                        
                        <Image
                          style={styles.prdImg}
                          source={prd1}
                        />
                          <View id="innerView" style={styles.innerPrdView}>
                              <Text style={styles.prdTitle}>Detergents</Text>
                              <TextInput
                                keyboardType = 'numeric'
                                placeholder= "Enter Number of Cartons"
                                style={{height: 40, fontSize:20, }}
                                onChangeText ={ (detergent) => { this.setState({detergent})}}
                                
                              />
          
                      </View>
                  </View>
            <TouchableHighlight
              style={styles.button}
              underlayColor="#CE93D8"
              onPress={()=> this.submitRecord(0)}
              >
              <Text style={{fontSize: 20, fontWeight:'bold'}}> RECORD TODAY </Text>
            </TouchableHighlight>

             <TouchableHighlight
              style={styles.button}
              underlayColor="#CE93D8"
              onPress={()=> this.submitRecord(1)}
              >
              <Text style={{fontSize: 20, fontWeight:'bold'}}> EDIT YESTERDAY </Text>
            </TouchableHighlight>

        </ScrollView>
        </KeyboardAvoidingView>
    );
  }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    
  },

  button:{
    alignItems: 'center',
    flex:1,
    padding:10,
    backgroundColor: "#F3E5F5",
    margin:15,
  },

  scrollView:{
    paddingRight:15,
    paddingLeft:15,

  },

  prdTitle:{
    fontSize:20,
    //paddingBottom:2,
    paddingTop:5,
  },
  prdView:{
    flexDirection:'row',
    padding:5,
  },
  prdImg:{
    width: 60,
    height: 60,
    marginLeft:5,
  },

  innerPrdView:{
    flex:1,
    marginLeft:5,

  }
});
