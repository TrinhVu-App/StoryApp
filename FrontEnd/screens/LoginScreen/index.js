import { View, Text, SafeAreaView, Image, TextInput, TouchableOpacity, Button, Alert } from 'react-native'
import React from 'react'
import styles from './styles'
import { useState } from 'react'

const LoginScreen = () => {
  const [email, onChangeEmail] = useState('');
  const [password, onChangePassword] = useState('');
  // const [btn, onBtnPressed] = useState('')
  return (
    <SafeAreaView style={styles.container}>
      <Image 
        source={require('../../assets/MonkeyIcon.jpeg')}
        style={styles.image}
      />

      <TextInput
        style={styles.textInput}
        placeholder='Email...'
        value={email}
        onChange={onChangeEmail}
      />

      <TextInput 
        style={styles.textInput}
        placeholder='Password...'
        value={password}
        onChange={onChangePassword}
      />

      <Button 
        title='Login'
        // onPress={() => Alert.alert('Email: ' + email + '\n' + 
        //                             'Password: ' + password)}
        onPress={() => Alert.alert(email)}
      />
    </SafeAreaView>
  )
}

export default LoginScreen