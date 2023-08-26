import { View, Text } from 'react-native'
import FontAwesome from 'react-native-vector-icons/FontAwesome';
import React from 'react'
import SelectDropdown from 'react-native-select-dropdown'
import styles from './styles'

const LevelFilter = () => {
    const levels = ['All levels', 'Level 1', 'Level 2', 'Level 3', 'Level 4']
  return (
    <SelectDropdown
    data={levels}
    onSelect={(selectedItem, index) => {
      console.log(selectedItem, index);
    }}
    defaultButtonText={'All levels'}
    buttonTextAfterSelection={(selectedItem, index) => {
      return selectedItem;
    }}
    rowTextForSelection={(item, index) => {
      return item;
    }}
    buttonStyle={styles.buttonStyle}
    buttonTextStyle={styles.buttonText}
    renderDropdownIcon={isOpened => {
      return <FontAwesome name={isOpened ? 'chevron-up' : 'chevron-down'} color={'#444'} size={18} />;
    }}
    dropdownIconPosition={'right'}
    rowStyle={styles.row}
    rowTextStyle={styles.buttonText}
  />
  )
}

export default LevelFilter