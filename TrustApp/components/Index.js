import React from 'react';
import {StyleSheet, Text, Image,View, KeyboardAvoidingView, AsyncStorage } from 'react-native';
import {ListItem, List,} from 'react-native-elements';
import face from '../images/icon_person.png';
import spinner from '../images/spinner.gif';


export default class Index extends React.Component {

  constructor(props){
    super(props)
    this.state={
      foot_soldiers: [],
      isLoadData: true,
      user_id: '',
    }
  }

 static navigationOptions = {
   header: null,
   
 };

 

  uploadGo = (soldier_name, soldier_id)=>{
    this.props.navigation.navigate('Upload', {
      user_name: soldier_name,
      soldier_id: soldier_id,
    });
  };

  _loadFootSoldiers = async ()=>{
    try {
      const value = await AsyncStorage.getItem('user');
      if (value !== null){
        // We have data!!
        //console.log(value);
        this.setState({
          user_id: value,
        });
      }
    } catch (error) {
      // Error retrieving data
      console.log('cant fetch id in index page');
      
    }

    const id = this.state.user_id;    
    //const idd = AsyncStorage.getItem('user');
    //const token = '&token=xxx12345trustapp67890zzz';
   // let url = 'http://trustindustries.rw/app/foot_soldiers_display.php?id=';
   let url = "http://trustindustries.rw/app/foot_soldiers_display.php?id="+`${id}`+"&token=xxx12345trustapp67890zzz";

   const response = await fetch(url);
   const json = await response.json();
   if(json != null){
     //console.log(json); 
     //const iid = AsyncStorage.getItem('user');
    //console.log(iid);
    
    this.setState({
      foot_soldiers: json,
      isLoadData:false,
    });
   }

   else{
    this.setState({
      foot_soldiers: [],
      //isLoadData: false,
    });
   }
   

 
  }

  componentDidMount(){
   
    this._loadInitialState().done();
    this._loadFootSoldiers();

  
  }

  
  
    _loadInitialState = async ()=> {
      var value = await AsyncStorage.getItem('user');
      if(value == null){
        this.props.navigation.navigate('Login');
      }
    }
    
 

    
  render() {

  
    

    
    return (
      <KeyboardAvoidingView style={styles.container}>
      <List>
      { this.state.isLoadData &&
          <View style={{alignSelf:'center', alignItems: 'center'}}>
            <Image
                source={spinner}
                style={{height:50, width:50, }}
            />
            <Text>Loading Your Foot-Soldiers...</Text>
            </View>
            }

          {this.state.foot_soldiers.map((soldier, i) => 
              (         
              <ListItem
              style={styles.listItem}
              key = {i}
              title={<Text style={styles.listTitle}>{soldier.name}</Text>}
              subtitle = {soldier.phone}
              roundAvatar
              avatar={face}
              onPress={()=> this.uploadGo(soldier.name, soldier.id)}
      
            />
            
              )
    )}
     </List>
    </KeyboardAvoidingView>
    );
  }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    
  },
  listTitle:{
    fontSize: 20,
    paddingLeft:10,

  }
});
